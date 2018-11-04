<?php

namespace App;

use App\Expensas\Liquidacion\Conceptos\ConceptosLiquidablesAggregator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $guarded = [];

    CONST ESTADO_ABIERTO = 'ABIERTO';

    CONST ESTADO_CERRADO = 'CERRADO';

    CONST RULE_TOTALES = 'numeric|min:0|max:100000000000';

    CONST RULES = [
        'total_expensa_a' => SELF::RULE_TOTALES,
        'total_expensa_b' => SELF::RULE_TOTALES,
        'total_expensa_c' => SELF::RULE_TOTALES,
        'total_expensa_ext_a' => SELF::RULE_TOTALES,
        'total_expensa_ext_b' => SELF::RULE_TOTALES,
        'total_expensa_ext_c' => SELF::RULE_TOTALES,
    ];

    CONST MESSAJES = [
        'numeric' => 'El campo ":attribute" debe ser numérico.',
        'min' => 'El campo ":attribute" puede ser negativo.',
        'max' => 'El campo ":attribute" supera el máximo permitido.',
    ];

    protected $conceptosLiquidables;

    public function detalles()
    {
        return $this->hasMany(PresupuestoDetalle::class);
    }

    public function cupones()
    {
        return $this->hasMany(Cupon::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('consorcio_id', function (Builder $builder) {
            $builder->where('consorcio_id', request('consorcio')->id);
        });
    }

    public function scopeAbierto($query)
    {

        return $query->where('estado', self::ESTADO_ABIERTO)->latest()->first();
    }

    public function scopeCerrado($query)
    {
        return $query->where('estado', self::ESTADO_CERRADO);
    }


    public static function hasCerrados()
    {
        return self::cerrado()->count() > 0;
    }

    public static function hasAbierto()
    {
        return self::abierto()->count() > 0;
    }

    public function setConceptosLiquidables(array $conceptos)
    {
        $this->conceptosLiquidables = $conceptos;
    }

    public function saveDetalle(PresupuestoDetalle $detalle)
    {
        DB::transaction(function () use ($detalle) {
            $this->detalles()->save($detalle);

            $this->calcularTotales();
        });

        return $this;
    }

    public function calcularTotales()
    {
        // TODO: Create test
        $this->total_expensa_a = $this->detalles()->sum('importe_a');
        $this->total_expensa_b = $this->detalles()->sum('importe_b');
        $this->total_expensa_c = $this->detalles()->sum('importe_c');
        $this->total_expensa_ext_a = $this->detalles()->sum('importe_ext_a');
        $this->total_expensa_ext_b = $this->detalles()->sum('importe_ext_b');
        $this->total_expensa_ext_c = $this->detalles()->sum('importe_ext_c');

        $this->save();
    }

    public function liquidar(ConceptosLiquidablesAggregator $conceptosLiquidablesAggregator)
    {
        DB::transaction(function () use ($conceptosLiquidablesAggregator) {

            $propiedades = Propiedad::liquidables();

            foreach ($propiedades as $propiedad) {

                $total = 0;

                $cupon_conceptos = [];

                $cupon = Cupon::create([
                    'propiedad_id' => $propiedad->id,
                    'presupuesto_id' => $this->id,
                ]);

                // Expenas ordinarias, extraordinarias, multas, notas de crédito...
                foreach ($conceptosLiquidablesAggregator->getConceptos() as $concepto) {

                    $importe = $concepto->calcularImporte($this, $propiedad);

                    if ($importe <> 0) { // puede ser negativo
                        $cupon_conceptos[] = new CuponConceptos([
                            'cupon_id' => $cupon->id,
                            'concepto_id' => $concepto->getId(),
                            'importe' => $importe,
                            'importe_formula' => '0,00000001 * 12500000 + ...'
                        ]);

                        $total += $importe;
                    }
                }

                $cupon->total = $total;
                $cupon->save();
                $cupon->conceptos()->saveMany($cupon_conceptos);

            }

            $this->estado = Presupuesto::ESTADO_CERRADO;
            $this->save();
        });
    }


}
