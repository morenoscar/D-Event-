<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('permisosEvento', function(Blueprint $table)
      {
        $table->string('Usuario_username');
        $table->integer('Evento_idEvento');
        $table->string('tipoUsuario')->default('');

        $table->primary(array('Usuario_username','Evento_idEvento'));
      });

      Schema::table('permisosEvento', function($table)
      {
        $table->foreign('Usuario_username')->references('username')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
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
      Schema::dropIfExists('permisosEvento');
    }
}
