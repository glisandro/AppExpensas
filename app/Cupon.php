<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Cupon extends Model
{
    public $guarded = [];

    public $table = 'cupones';
    
    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class);
    }

    public function conceptos()
    {
        return $this->hasMany(CuponConceptos::class);
    }

    public function scopePropiedad(Builder $builder, Propiedad $propiedad)
    {
        return $builder->where('propiedad_id', $propiedad->id);
    }

    public function getTotalAttribute($value)
    {
        return number_format($value,2,",",".");
    }
}
