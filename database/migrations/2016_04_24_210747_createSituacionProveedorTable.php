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
        $table->integer('idCategoria');
        $table->integer('idProveedor');
        $table->string('situacion')->default('');
        $table->integer('precio')->nullable();

        $table->primary(array('idProveedor','idCategoria'));
      });

      Schema::table('situacionProveedor', function($table)
      {
        $table->foreign('idCategoria')->references('idCategoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
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
