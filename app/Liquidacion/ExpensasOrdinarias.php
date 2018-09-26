<?php

namespace App\Liquidacion;

use App\{
    Presupuesto, Propiedad
};

class ExpenasOrinarias extends ConceptoLiquidable
{
    const ID = 1;

    public function __construct(Presupuesto $presupuesto)
    {
        parent::__construct(SELF::ID, $presupuesto);
    }

    public function calcularImporte(Propiedad $propiedad)
    {
        $total = $propiedad->coeficiente_a * $this->presupuesto->total_expensa_a;
        $total += $propiedad->coeficiente_b * $this->presupuesto->total_expensa_b;
        $total += $propiedad->coeficiente_c * $this->presupuesto->total_expensa_c;

        return $total;
    }
}