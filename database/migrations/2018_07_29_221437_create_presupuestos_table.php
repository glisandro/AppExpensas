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
            $table->string('periodo');//TODO: vvambiar a date
            $table->integer('consorcio_id');
            $table->date('desde');
            $table->date('hasta');
            $table->double('total_expensa_a', 20, 2)->default(0);
            $table->double('total_expensa_b', 20, 2)->default(0);
            $table->double('total_expensa_c', 20, 2)->default(0);
            $table->double('total_expensa_ext_a', 20, 2)->default(0);
            $table->double('total_expensa_ext_b', 20, 2)->default(0);
            $table->double('total_expensa_ext_c', 20, 2)->default(0);
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
