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
     * @param array $conceptos
     */
    public function __construct(array $conceptos)
    {
        $this->conceptos = $conceptos;
    }

    /**
     * @return array
     */
    public function getConceptos() : array
    {
        return $this->conceptos;
    }

}