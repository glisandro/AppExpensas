<?php

namespace App\Expensas\Liquidacion\Conceptos;

use App\{
    Presupuesto, Propiedad
};

class ExpensasExtraordinarias extends ConceptoLiquidable
{
    protected $id = 2;

    protected $incrementa = true;

    public function calcularImporte(Presupuesto $presupuesto, Propiedad $propiedad)
    {
        $total = $propiedad->coeficiente_d * $presupuesto->total_expensa_ext_a;
        $total += $propiedad->coeficiente_e * $presupuesto->total_expensa_ext_b;
        $total += $propiedad->coeficiente_f * $presupuesto->total_expensa_ext_c;

        return $total;
    }
}