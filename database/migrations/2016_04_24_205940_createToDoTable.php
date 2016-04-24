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
        $table->integer('idItem');
        $table->string('nota')->default('');
        $table->date('fecha');
        $table->string('estado')->default('');
        $table->integer('Evento_idEvento');

        $table->primary('idItem');
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
