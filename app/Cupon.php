<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    public $guarded = [];

    public $table = 'cupones';

    public $conceptos = [];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class);
    }

    public function conceptos()
    {
        return $this->hasMany(CuponConcepto::class);
    }

    public function scopePropiedad(Builder $builder, Propiedad $propiedad)
    {
        return $builder->where('propiedad_id', $propiedad->id);
    }

    public function getTotalAttribute($value)
    {
        return number_format($value, 2, ",", ".");
    }
}
