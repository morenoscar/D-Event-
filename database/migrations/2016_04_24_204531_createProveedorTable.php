<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proveedor', function(Blueprint $table)
      {
        $table->integer('idProveedor');
        $table->string('nombre')->default('');
        $table->string('descripcion')->default('');
        $table->binary('foto');
        $table->string('direccion')->default('');
        $table->string('correoElectronico')->default('');
        $table->string('telefono')->default('');
        $table->integer('precio')->default(0);

        $table->primary('idProveedor');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('proveedor');
    }
}
