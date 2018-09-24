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

            $this->total_expensa_a = $this->gastos()->sum('importe_a');
            $this->total_expensa_b = $this->gastos()->sum('importe_b');
            $this->total_expensa_c = $this->gastos()->sum('importe_c');

            $this->save();
        });
    }

    public function liquidar()
    {
        DB::transaction(function(){
            
            $propiedades = Propiedad::liquidables();

            foreach ($propiedades as $propiedad){

                $cupon = Cupon::create([
                    'propiedad_id' => $propiedad->id,
                    'presupuesto_id' => $this->id,
                ] );

                // Concepto EXPENSAS
                $cupon_concepto = CuponConceptos::create([
                    'cupon_id' => $cupon->id,
                    'concepto_id' => 1, // concepto EXPENSAS
                    'importe' => $this->montoOrdinarias($propiedad)
                ]);

                // Otros conceptos, multas, notas de crédito...

                $cupon->conceptos()->save($cupon_concepto);

            }
            
            $this->estado = Presupuesto::ESTADO_CERRADO;
            $this->save();
        });
    }

    private function montoOrdinarias(Propiedad $propiedad)
    {
        $total = $propiedad->coeficiente_a * $this->total_expensa_a;
        $total += $propiedad->coeficiente_b * $this->total_expensa_b;
        $total += $propiedad->coeficiente_c * $this->total_expensa_c;

        return $total;
    }

}
