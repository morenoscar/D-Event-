<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ubicacion', function(Blueprint $table)
      {
        $table->integer('idUbicacion');
        $table->integer('Evento_idEvento');
        $table->double('posicionX');
        $table->double('posicionY');
        $table->double('tamano');
        $table->integer('Figura_idFigura');

        $table->primary('idUbicacion');
      });

      Schema::table('ubicacion', function($table)
      {
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Figura_idFigura')->references('idFigura')->on('figura')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
