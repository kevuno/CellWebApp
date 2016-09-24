<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioImeiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create a inventarioImei table
        Schema::create('inventario_imeis', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('imei')->unique();
            $table->string('estatus');
            $table->string('modelo');
            $table->string('marca');
            $table->string('bodega_id');
            $table->timestamp('fecha_ingreso');
            $table->string('ingresado_por');
            $table->float('precio_min');
            $table->float('precio_max');
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
        //
    }
}
