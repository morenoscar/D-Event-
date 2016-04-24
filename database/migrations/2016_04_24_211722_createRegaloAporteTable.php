<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegaloAporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*Schema::create('regaloAporte', function(Blueprint $table)
      {
        $table->string('descripcion')->default('');
        $table->integer('idRegalo/Aporte');
        $table->string('nombreRegalo/Aporte')->default('');
        $table->integer('Evento_idEvento');
        $table->integer('Invitado_idInvitado');

        $table->primary('idRegalo/Aporte');
      });

      Schema::table('regaloAporte', function($table)
      {
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Invitado_idInvitado')->references('idInvitado')->on('invitado')->onDelete('cascade')->onUpdate('cascade');
      });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //Schema::dropIfExists('regaloAporte');
    }
}
