<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    public function detalles()
    {
        return $this->hasMany(PresupuestoDetalle::class);
    }
}
