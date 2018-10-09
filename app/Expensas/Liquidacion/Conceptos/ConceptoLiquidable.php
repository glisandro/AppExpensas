<?php

namespace App\Expensas\Liquidacion\Conceptos;

use App\{
    Presupuesto, Propiedad
};

abstract class ConceptoLiquidable
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    abstract public function calcularImporte(Presupuesto $presupuesto, Propiedad $propiedad);
}