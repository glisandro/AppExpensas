<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $guarded = [];

    public static $estado_abierto = 'abierto';
    
    public static $estado_cerrado = 'cerrado';

    protected static function boot()
    {
        parent::boot();

       static::addGlobalScope('consorcio_id', function (Builder $builder) {

            $builder->where('consorcio_id', request('consorcio')->id);
        });
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
}
