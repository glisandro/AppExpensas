<?php

namespace App\Expensas\Liquidacion\Conceptos;

use App\Presupuesto;
use App\Propiedad;

class ExpensasOrdinarias extends ConceptoLiquidable
{
    protected $id = 1;

    protected $incrementa = true;

    public function calcularImporte(Presupuesto $presupuesto, Propiedad $propiedad)
    {
        $importe = $propiedad->coeficiente_a * $presupuesto->total_expensa_a;
        $importe += $propiedad->coeficiente_b * $presupuesto->total_expensa_b;
        $importe += $propiedad->coeficiente_c * $presupuesto->total_expensa_c;

        return $importe;
    }
}