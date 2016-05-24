<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categoria', function(Blueprint $table)
      {
        $table->integer('idCategoria');
        $table->string('nombre')->unique();
        $table->string('descripcion')->default('');

        $table->primary('idCategoria');
      });

      Schema::create('categoriaEvento', function(Blueprint $table)
      {
        $table->integer('idCategoria');
        $table->integer('Evento_idEvento');

        $table->primary(array('idCategoria','Evento_idEvento'));
      });

      Schema::table('categoriaEvento', function($table)
      {
        $table->foreign('idCategoria')->references('idCategoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('categoriaEvento');
    }
}
