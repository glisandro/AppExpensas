<?php

namespace App;

use App\Expensas\Liquidacion\Conceptos\ConceptosLiquidablesAggregator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $guarded = [];

    CONST ESTADO_ABIERTO = 'ABIERTO';
    
    CONST ESTADO_CERRADO = 'CERRADO';

    protected $conceptosLiquidables;


    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

    protected static function boot()
    {
        parent::boot();

       static::addGlobalScope('consorcio_id', function (Builder $builder) {

            $builder->where('consorcio_id', request('consorcio')->id);
        });
    }

    public function scopeAbierto($query)
    {
        return $query->where('estado', self::ESTADO_ABIERTO);
    }

    public function scopeCerrado($query)
    {
        return $query->where('estado', self::ESTADO_CERRADO);
    }

    public function setConceptosLiquidables(array $conceptos)
    {
        $this->conceptosLiquidables =  $conceptos;
    }

    public function saveGasto(Gasto $gasto)
    {
        DB::transaction(function() use($gasto){
            $this->gastos()->save($gasto);

            $this->calcularTotales();
        });

        return $this;
    }

    protected function calcularTotales()
    {
        // TODO: Create test
        $this->total_expensa_a = $this->gastos()->where('extraordinario', 0)->sum('importe_a');
        $this->total_expensa_b = $this->gastos()->where('extraordinario', 0)->sum('importe_b');
        $this->total_expensa_c = $this->gastos()->where('extraordinario', 0)->sum('importe_c');
        $this->total_expensa_ext_a = $this->gastos()->where('extraordinario', 1)->sum('importe_a');
        $this->total_expensa_ext_b = $this->gastos()->where('extraordinario', 1)->sum('importe_b');
        $this->total_expensa_ext_c = $this->gastos()->where('extraordinario', 1)->sum('importe_c');

        $this->save();
    }

    public function liquidar(ConceptosLiquidablesAggregator $conceptosLiquidablesAggregator)
    {
        DB::transaction(function() use($conceptosLiquidablesAggregator){
            
            $propiedades = Propiedad::liquidables();

            foreach ($propiedades as $propiedad){

                $total = 0;

                $cupon_conceptos = [];

                $cupon = Cupon::create([
                    'propiedad_id' => $propiedad->id,
                    'presupuesto_id' => $this->id,
                ]);

                // Expenas ordinarias, extraordinarias, multas, notas de crédito...
                foreach ($conceptosLiquidablesAggregator->getConceptos() as $concepto){

                    $importe = $concepto->calcularImporte($this, $propiedad);

                    if($importe <> 0){ // puede ser negativo
                        $cupon_conceptos[] = new CuponConceptos([
                            'cupon_id' => $cupon->id,
                            'concepto_id' => $concepto->getId(),
                            'importe' => $importe,
                            'importe_formula' => '0,00000001 * 12500000 + ...'
                        ]);

                        $total += $importe;
                    }
                }

                $cupon->total = $total;
                $cupon->save();
                $cupon->conceptos()->saveMany($cupon_conceptos);

            }
            
            $this->estado = Presupuesto::ESTADO_CERRADO;
            $this->save();
        });
    }



}
