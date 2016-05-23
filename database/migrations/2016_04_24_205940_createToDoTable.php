<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('toDo', function(Blueprint $table)
      {
        $table->integer('idItem',true);
        $table->string('nota')->default('');
        $table->string('nombre')->default('')->nullable();
        $table->string('prioridad')->default('ALTA');
        $table->date('fecha');
        $table->string('estado')->default('');
        $table->integer('Evento_idEvento');

      });

      Schema::table('toDo', function($table)
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
      Schema::dropIfExists('toDo');
    }
}
