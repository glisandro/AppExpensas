<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('presupuesto_id')->index();
            $table->integer('rubro_id');
            $table->string('concepto');
            $table->double('importe_a')->nullable();
            $table->double('importe_b')->nullable();
            $table->double('importe_c')->nullable();
            $table->double('importe_ext_a')->nullable();
            $table->double('importe_ext_b')->nullable();
            $table->double('importe_ext_c')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos_detalles');
    }
}
