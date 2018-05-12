<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Consorcio extends Model
{
    protected $fillable = ['name', 'team_id', 'owner_id'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('team_id', function (Builder $builder) {

            // El consorcio siempre debe pertenecer al equipo actual
            $builder->where('team_id', Auth::user()->currentTeam()->id);
        });
    }
}
