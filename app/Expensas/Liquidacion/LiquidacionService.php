<?php

namespace App\Expensas\Liquidacion;

use App\Cupon;
use App\CuponConcepto;

class LiquidacionService
{
    protected $conceptos;

    protected $propiedades;

    protected $presupuesto;

    protected $cupones;

    /**
     * ConceptosLiquidablesAggregator constructor.
     * @param array $conceptos
     */
    public function __construct(array $conceptos)
    {
        $this->conceptos = app()->make(LiquidacionConceptos::class, ['conceptos' => $conceptos]);
    }

    public function getConceptos()
    {
        return $this->conceptos;
    }

    public function setPropiedades($propiedades)
    {
        $this->propiedades = $propiedades;

        return $this;
    }

    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;

        return $this;
    }

    public function generarCupones()
    {
        foreach ($this->propiedades as $propiedad) {

            $cupon = Cupon::create([
                'propiedad_id' => $propiedad->id,
                'presupuesto_id' => $this->presupuesto->id,
            ]);

            $cupon->conceptos = $this->generarConceptosCupon($propiedad, $cupon);

            //$cupon->total = $this->totalPropiedad();
            $cupones[] = $cupon;
            //$cupon->save();
            //$cupon->conceptos()->saveMany($cuponConceptos);
        }

        return $cupones;
    }

    public function generarConceptosCupon($propiedad, $cupon)
    {
        $totalCupon = 0;

        foreach ($this->getConceptos() as $concepto) {

            $importe = $concepto->calcularImporte($this->presupuesto, $propiedad);

            if ($importe <> 0) { // puede ser negativo
                $cupon_conceptos[] = new CuponConcepto([
                    'cupon_id' => $cupon->id,
                    'concepto_id' => $concepto->getId(),
                    'importe' => $importe,
                    'importe_formula' => '0,00000001 * 12500000 + ...'
                ]);

                $totalCupon += $importe;
            }

            $cupon->total = $totalCupon;
        }

        return $cupon_conceptos;
    }
    

}