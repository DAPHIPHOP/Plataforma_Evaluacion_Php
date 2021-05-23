<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_apps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idList');
            $table->string ('nombreAppList',45);
            $table->string ('idAppList',45);
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
        Schema::dropIfExists('lista_apps');
    }
}
