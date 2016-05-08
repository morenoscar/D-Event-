<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('evento', function($table)
      {
          $table->string('descripcion')->default('');
          $table->string('estado')->default('');
          $table->date('fechaFin');
          $table->date('fechaInicio');
          $table->time('horaFin');
          $table->time('horaInicio');
          $table->integer('idEvento');
          $table->string('nombre')->default('');
          $table->string('foto')->default('');
          $table->integer('presupuesto')->default(0);
          $table->integer('TipoEvento_idTipoEvento');
          $table->string('direccion')->default('');
          $table->date('recordatorio');

          $table->primary('idEvento');
      });

      Schema::table('evento', function($table)
      {
            $table->foreign('TipoEvento_idTipoEvento')->references('idTipoEvento')->on('tipoEvento')->onDelete('cascade')->onUpdate('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('evento');
  }
}
