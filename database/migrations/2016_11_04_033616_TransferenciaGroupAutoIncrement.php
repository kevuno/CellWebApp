<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransferenciaGroupAutoIncrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Setting the transferencia_group column as autoincrement
        Schema::table('transferencias', function ($table) {
            $table->increments('transferencia_grupo')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Setting the transferencia_group column as integer
        Schema::table('transferencias', function ($table) {
            $table->integer('transferencia_grupo')->change();
        });
    }
}
