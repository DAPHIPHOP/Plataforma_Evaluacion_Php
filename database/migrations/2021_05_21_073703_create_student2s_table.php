<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudent2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student2s', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idAlumno');
            $table->string ('DNIAl',45);
            $table->integer ('EstadoAl');
            $table->integer ('idUser')-> unsigned();
            $table->integer ('idEvalu')-> unsigned();
            
            $table->timestamps();

            $table->foreign('idUser') -> references('id')-> on ('users') -> onDelete('restrict') -> onUpdate ('cascade');
            $table->foreign('idEvalu') -> references('idEvalu')-> on ('evaluacions') -> onDelete('restrict') -> onUpdate ('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student2s');
    }
}
