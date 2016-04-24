<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoEventoTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tipoEvento', function(Blueprint $table)
      {
          $table->integer('idTipoEvento');
          $table->string('nombre')->unique();

          $table->primary('idTipoEvento');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('tipoEvento');
  }
}
