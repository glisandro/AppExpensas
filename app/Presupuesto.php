<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $guarded = [];

    CONST ESTADO_ABIERTO = 'ABIERTO';
    
    CONST ESTADO_CERRADO = 'CERRADO';

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

    public function addGasto(Gasto $gasto)
    {
        // TODO: Create test
        DB::transaction(function() use ($gasto){
            $this->gastos()->save($gasto);
           
            if ($gasto->extraordinario) {
                $this->total_expensa_ext_a = $this->gastos()->sum('importe_a');
                $this->total_expensa_ext_b = $this->gastos()->sum('importe_b');
                $this->total_expensa_ext_c = $this->gastos()->sum('importe_c');
            } else {
                $this->total_expensa_a = $this->gastos()->sum('importe_a');
                $this->total_expensa_b = $this->gastos()->sum('importe_b');
                $this->total_expensa_c = $this->gastos()->sum('importe_c');
            }

            $this->save();
        });
    }

    public function liquidar($conceptosLiquidables)
    {
        DB::transaction(function() use($conceptosLiquidables){
            
            $propiedades = Propiedad::liquidables();

            foreach ($propiedades as $propiedad){

                $total = 0;

                $cupon_conceptos = [];

                $cupon = Cupon::create([
                    'propiedad_id' => $propiedad->id,
                    'presupuesto_id' => $this->id,
                ] );

                // Expenas ordinarias, extraordinarias, multas, notas de crédito...
                foreach ($conceptosLiquidables as $conceptoLiquidable){

                    $importe = $conceptoLiquidable->calcularImporte($propiedad);

                    if($importe <> 0){ // puede ser negativo
                        $cupon_conceptos[] = new CuponConceptos([
                            'cupon_id' => $cupon->id,
                            'concepto_id' => $conceptoLiquidable->getId(),
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
