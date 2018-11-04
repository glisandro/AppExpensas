<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
