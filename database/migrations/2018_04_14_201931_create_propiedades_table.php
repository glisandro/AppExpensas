<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('denominacion');
            $table->integer('consorcio_id');
            $table->decimal('coeficiente_a', 8, 7)->default(0);
            $table->decimal('coeficiente_b', 8, 7)->default(0);
            $table->decimal('coeficiente_c', 8, 7)->default(0);
            $table->decimal('coeficiente_d', 8, 7)->default(0);
            $table->decimal('coeficiente_e', 8, 7)->default(0);
            $table->decimal('coeficiente_f', 8, 7)->default(0);
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
        Schema::dropIfExists('propiedades');
    }
}
