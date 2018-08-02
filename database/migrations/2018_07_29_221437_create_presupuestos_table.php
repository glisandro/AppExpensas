<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periodo');
            $table->integer('consorcio_id');
            $table->dateTime('desde');
            $table->dateTime('hasta');
            $table->double('importe_a');
            $table->double('importe_b');
            $table->double('importe_c');
            $table->double('importe_d');
            $table->double('importe_e');
            $table->double('importe_f');
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
        Schema::dropIfExists('presupuestos');
    }
}
