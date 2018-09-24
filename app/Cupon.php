<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
}
