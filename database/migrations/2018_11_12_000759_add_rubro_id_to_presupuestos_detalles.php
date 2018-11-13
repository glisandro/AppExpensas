<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddRubroIdToPresupuestosDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuestos_detalles', function (Blueprint $table){
            $table->unsignedInteger('rubro_id');
            $table->foreign('rubro_id')->references('id')->on('rubros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presupuestos_detalles', function(Blueprint $table){
            $table->dropForeign(['rubro_id']);
            $table->dropColumn('rubro_id');
        });
    }
}
