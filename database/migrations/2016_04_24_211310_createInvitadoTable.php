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
        $table->integer('idInvitado',true);
        $table->string('nombre')->default('');
        $table->integer('Ubicacion_idUbicacion')->nullable();
        $table->integer('RegaloAporte_idRegaloAporte')->nullable();
        $table->integer('Evento_idEvento');
      });

      Schema::create('regaloAporte', function(Blueprint $table)
      {
        $table->string('descripcion')->default('');
        $table->integer('idRegaloAporte',true);
        $table->string('nombreRegaloAporte')->default('');
        $table->integer('Evento_idEvento');
        $table->integer('Invitado_idInvitado')->nullable();
      });

      Schema::create('invitadoEvento', function(Blueprint $table)
      {
        $table->integer('Invitado_idInvitado');
        $table->integer('Evento_idEvento');
        $table->string('estado')->default('NO_CONFIRMADO');
        $table->primary(array('Invitado_idInvitado','Evento_idEvento'));
      });

      Schema::table('invitado', function($table)
      {
        $table->foreign('Ubicacion_idUbicacion')->references('idUbicacion')->on('ubicacion')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('RegaloAporte_idRegaloAporte')->references('idRegaloAporte')->on('regaloAporte')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('regaloAporte', function($table)
      {
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Invitado_idInvitado')->references('idInvitado')->on('invitado')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('invitadoEvento', function($table)
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
      Schema::dropIfExists('invitadoEvento');
    }
}
