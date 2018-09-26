<?php

namespace App\Liquidacion;

use App\{
    Presupuesto, Propiedad
};

abstract class ConceptoLiquidable
{
    protected $id;

    protected $presupuesto;

    public function  __construct($id, Presupuesto $presupuesto)
    {
        $this->id = $id;
        $this->presupuesto =  $presupuesto;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    abstract public function calcularImporte(Propiedad $propiedad);
}