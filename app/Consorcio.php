<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Consorcio extends Model
{
    protected $guarded = [];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('team_id', function (Builder $builder) {
            $builder->where('team_id', Auth::user()->currentTeam()->id);
        });
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class);
    }

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class);
    }
}
