<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuponesConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupones_conceptos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cupon_id');
            $table->integer('concepto_id'); // TODO: Crear tabla conceptos con signo
            $table->double('importe');
            $table->string('importe_formula');
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
        Schema::dropIfExists('cupones_conceptos');
    }
}
