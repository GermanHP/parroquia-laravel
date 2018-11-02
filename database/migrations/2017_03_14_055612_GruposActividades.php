<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GruposActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gruposactividades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idGrupo')->unsigned();
            $table->foreign('idGrupo') ->references('id')->on('grupos');
            $table->integer('idActividad')->unsigned();
            $table->foreign('idActividad') ->references('id')->on('actividades');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gruposactividades');
    }
}
