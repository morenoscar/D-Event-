<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiguraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('figura', function(Blueprint $table)
      {
        $table->integer('idFigura');
        $table->string('imagen');
        $table->string('nombre')->nullable();

        $table->primary('idFigura');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('figura');
    }
}
