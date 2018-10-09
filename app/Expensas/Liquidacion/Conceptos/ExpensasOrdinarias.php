<?php

namespace App\Expensas\Liquidacion\Conceptos;

use App\{
    Presupuesto, Propiedad
};

class ExpensasOrinarias extends ConceptoLiquidable
{
    protected $id = 1;

    protected $incrementa = true;
    
    public function calcularImporte(Presupuesto $presupuesto, Propiedad $propiedad)
    {
        $total = $propiedad->coeficiente_a * $presupuesto->total_expensa_a;
        $total += $propiedad->coeficiente_b * $presupuesto->total_expensa_b;
        $total += $propiedad->coeficiente_c * $presupuesto->total_expensa_c;

        return $total;
    }
}