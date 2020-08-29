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
        $importe = $propiedad->coeficiente_d * $presupuesto->total_expensa_ext_a;
        $importe += $propiedad->coeficiente_e * $presupuesto->total_expensa_ext_b;
        $importe += $propiedad->coeficiente_f * $presupuesto->total_expensa_ext_c;

        return $importe;
    }
}