<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garantias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventario_id');
            $table->string('estatus'); //?
            $table->date('fecha_solicitud'); //Fecha en la que se creo la solicitud de garantia
            $table->date('fecha_regreso'); //Fecha en la que el equipo regresó de vuelta a la bodega
            $table->string('destino'); //El lugar al que se va a enviar el equipo
            $table->string('solicitado_por'); //El usuario que creo la solicitud
            $table->string('recibido_por'); //EL usuario que recibio el equipo de vuelta.
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
        Schema::drop('garantias');
    }
}
