<?php

namespace App\Expensas\Liquidacion\Conceptos;

use App\{
    Presupuesto, Propiedad
};

class MontoFijo extends ConceptoLiquidable
{
    protected $id = 3;
    

    protected $incrementa = true;
    
    public function calcularImporte(Presupuesto $presupuesto, Propiedad $propiedad)
    {
        return 100;
    }
}