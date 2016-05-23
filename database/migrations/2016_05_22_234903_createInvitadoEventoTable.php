<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadoEventoTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    /*Schema::create('invitadoEvento', function(Blueprint $table)
    {
      $table->string('Invitado_idInvitado');
      $table->integer('Evento_idEvento');
      $table->string('estado')->default('NO_CONFIRMADO');

      $table->primary(array('Invitado_idInvitado','Evento_idEvento'));
    });

    Schema::table('invitadoEvento', function($table)
    {
      $table->foreign('Invitado_idInvitado')->references('idInvitado')->on('invitado')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
    });*/

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //Schema::dropIfExists('invitadoEvento');
  }
}
