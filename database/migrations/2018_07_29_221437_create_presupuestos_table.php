<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->date('desde');
            $table->date('hasta');
            $table->double('total_expensa_a');
            $table->double('total_expensa_b');
            $table->double('total_expensa_c');
            $table->double('total_expensa_ext_a');
            $table->double('total_expensa_ext_b');
            $table->double('total_expensa_ext_c');
            $table->string('estado')->default('abierto');
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
