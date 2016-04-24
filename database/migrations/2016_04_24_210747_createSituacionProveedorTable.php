<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSituacionProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('situacionProveedor', function(Blueprint $table)
      {
        $table->integer('Evento_idEvento');
        $table->integer('Proveedor_idProveedor');
        $table->string('situacion')->default('');

        $table->primary(array('Proveedor_idProveedor','Evento_idEvento'));
      });

      Schema::table('situacionProveedor', function($table)
      {
        $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Proveedor_idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('situacionProveedor');
    }
}
