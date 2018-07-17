<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';

    protected $fillable = ['denominacion', 'consorcio_id', 'coeficiente_a', 'coeficiente_b', 'coeficiente_c', 'coeficiente_d', 'coeficiente_e', 'coeficiente_f'];
    
}
