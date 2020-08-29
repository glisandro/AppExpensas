<?php

namespace App\Expensas\Liquidacion;

use Countable;
use IteratorAggregate;

class LiquidacionConceptos implements IteratorAggregate
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

    public function getIterator()
    {
        return (function () {
            foreach ($this->conceptos as $concepto) {
                yield app()->make($concepto);
            }
        })();
    }
}