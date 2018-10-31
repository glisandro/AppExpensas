<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('consorcio_id', function (Builder $builder) {
            $builder->where('consorcio_id', request('consorcio')->id);
        });
    }

    public function scopeLiquidables()
    {
        return $this->all();
    }
}
