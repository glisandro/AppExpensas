<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{
    public function consorcios()
    {
        return $this->hasMany(Consorcio::class);
    }
}
