<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDirecciones');
            $table->string ('direccionIP',45);
            $table->string ('direccionMAC',45);
            $table->integer ('idAlumno')-> unsigned();
            $table->timestamps();

            $table->foreign('idAlumno') -> references('idAlumno')-> on ('student2s') -> onDelete('restrict') -> onUpdate ('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
