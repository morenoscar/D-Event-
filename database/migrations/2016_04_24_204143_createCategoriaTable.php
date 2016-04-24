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
        $table->integer('Evento_idEvento');

        $table->primary('idCategoria');
      });

      Schema::table('categoria', function($table)
      {
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
    }
}
