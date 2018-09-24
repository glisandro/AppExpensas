<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    public $guarded = [];
    
    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class);
    }

}
