<?php

namespace App\Expensas\Liquidacion\Conceptos;

use App\{
    Presupuesto, Propiedad
};

class ConceptosLiquidablesAggregator
{
    protected $conceptos = [];

    /**
     * ConceptosLiquidablesAggregator constructor.
     * @param $conceptos
     */
    public function __construct(array $conceptos)
    {
        $this->conceptos = $conceptos;
    }

    /**
     * @return mixed
     */
    public function getConceptos() : array
    {
        return $this->conceptos;
    }

}