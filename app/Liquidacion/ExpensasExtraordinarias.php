<?php

namespace App\Liquidacion;

use App\{
    Presupuesto, Propiedad
};

class ExpensasExtraordinarias extends ConceptoLiquidable
{
    const ID = 2;
    
    public function __construct(Presupuesto $presupuesto)
    {
        parent::__construct(SELF::ID, $presupuesto);
    }

    public function calcularImporte(Propiedad $propiedad)
    {
        $total = $propiedad->coeficiente_d * $this->presupuesto->total_expensa_ext_a;
        $total += $propiedad->coeficiente_e * $this->presupuesto->total_expensa_ext_b;
        $total += $propiedad->coeficiente_f * $this->presupuesto->total_expensa_ext_c;

        return $total;
    }
}