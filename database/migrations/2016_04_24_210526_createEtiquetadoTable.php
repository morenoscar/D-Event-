<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('etiquetado', function(Blueprint $table)
      {
        $table->integer('Proveedor_idProveedor');
        $table->integer('Categoria_idCategoria');
        $table->string('nombe')->default('');

        $table->primary(array('Proveedor_idProveedor','Categoria_idCategoria'));
      });

      Schema::table('etiquetado', function($table)
      {
        $table->foreign('Proveedor_idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('Categoria_idCategoria')->references('idCategoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('etiquetado');
    }
}
