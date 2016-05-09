<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('invitado', function(Blueprint $table)
      {
        $table->string('correo')->unique();
        $table->string('estado')->default('');
        $table->integer('idInvitado',true);
        $table->string('nombre')->default('');
        $table->integer('Objeto_idOBjeto');
        $table->integer('RegaloAporte_idRegaloAporte');
        $table->integer('Evento_idEvento');

      });

      Schema::create('regaloAporte', function(Blueprint $table)
      {
        $table->string('descripcion')->default('');
        $table->integer('idRegaloAporte',true);
        $table->string('nombreRegaloAporte')->default('');
        $table->integer('Evento_idEvento');
        $table->integer('Invitado_idInvitado');

      });

      Schema::table('invitado', function($table)
      {
        $table->foreign('Objeto_idOBjeto')->references('idObjeto')->on('objeto')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('RegaloAporte_idRegaloAporte')->references('idRegaloAporte')->on('regaloAporte')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('regaloAporte', function($table)
      {
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Invitado_idInvitado')->references('idInvitado')->on('invitado')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('invitado');
      Schema::dropIfExists('regaloAporte');
    }
}
