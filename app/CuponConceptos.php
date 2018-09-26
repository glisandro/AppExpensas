<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuponConceptos extends Model
{
    public $guarded = [];

    public $table = 'cupones_conceptos';
    
    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }

    public function concepto()
    {
        return $this->belongsTo(Concepto::class);
    }

    public function getImporteAttribute($value)
    {
        return number_format($value,2,",",".");
    }
    
}
