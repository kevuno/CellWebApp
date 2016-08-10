<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventario_id');
            $table->string('estatus');
            $table->date('fecha_solicitud');//Fecha en la que se creo la solicitud de transferencia
            $table->date('fecha_llegada'); //Fecha en la que el equipo arrivo a la nueva bodega
            $table->string('bodega_origen');
            $table->string('bodega_destino');
            $table->string('transferido_por'); //El usuario que creo la solicitud
            $table->string('recibido_por'); //EL usuario de la bodega destino que recibio el equipo.              
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
        Schema::drop('transferencias');
    }
}
