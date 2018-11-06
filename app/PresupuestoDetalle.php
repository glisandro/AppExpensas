<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PresupuestoDetalle extends Model
{
    public $table = 'presupuestos_detalles';

    public $guarded = [];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class);
    }

    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('presupuesto_id', function (Builder $builder)
        {
            //Si existe el presupuesto en el parametro lo tomo sino es el abierto
            $presupuesto = (request('presupuesto')) ?? request('consorcio')->presupuestos()->abierto();

            $builder->where('presupuesto_id', $presupuesto->id);
        });
    }

}
