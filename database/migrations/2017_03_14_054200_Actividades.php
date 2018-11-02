<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Actividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('fechaDeVigencia');
            $table->string('HoraInicio');
            $table->string('HoraFin');
            $table->string('otrosDatosDeInteres')->nulleable();
            $table->integer('idTipoActividad')->unsigned();
            $table->foreign('idTipoActividad') ->references('id')->on('tipoactividad');
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
        Schema::dropIfExists('actividades');
    }
}
