<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('usuario', function(Blueprint $table)
      {
          $table->string('apellido')->default('');
          $table->string('correo')->unique();
          $table->string('direccion')->default('');
          $table->date('fechaNacimiento');
          $table->string('foto')->default('/img/profile/default.png');
          $table->string('nombre')->default('');
          $table->string('password')->default('');
          $table->string('username')->default('');
          $table->primary('username');
          $table->string('remember_token', 100) -> nullable();
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('usuario');
  }
}
