<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('calificacion', function(Blueprint $table)
      {
        $table->integer('Proveedor_idProveedor');
        $table->integer('idCalificacion');
        $table->string('comentario')->default('');
        $table->integer('puntaje')->default('-1');

        $table->primary('idCalificacion');
      });

      Schema::table('calificacion', function($table)
      {
        $table->foreign('Proveedor_idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('calificacion');
    }
}
