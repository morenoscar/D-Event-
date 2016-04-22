<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablasModelo1 extends Migration
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
            $table->binary('foto');
            $table->string('nombre')->default('');
            $table->string('password')->default('');
            $table->string('username')->default('');

            $table->primary('username');
        });

        Schema::create('evento', function(Blueprint $table)
          {
              $table->string('descripcion')->default('');
              $table->string('estado')->default('');
              $table->date('fechaFin');
              $table->date('fechaInicio');
              $table->time('horaFin');
              $table->time('horaInicio');
              $table->increments('idEvento');
              $table->string('nombre')->default('');
              $table->integer('presupuesto')->default(0);
              $table->integer('TipoEvento_idTipoEvento');
              $table->string('direccion')->default('');
              $table->date('recordatorio');

              $table->primary('idEvento');
              $table->foreign('TipoEvento_idTipoEvento')->references('idTipoEvento')->on('tipoEvento')->onDelete('cascade')->onUpdate('cascade');
          });

          Schema::create('tipoEvento', function(Blueprint $table)
            {
                $table->increments('idTipoEvento');
                $table->string('nombre')->unique();

                $table->primary('idTipoEvento');
            });

          Schema::create('calificacion', function(Blueprint $table)
            {
                $table->integer('Proveedor_idProveedor');
                $table->increments('idCalificacion');
                $table->string('comentario')->default('');
                $table->integer('puntaje')->default('');

                $table->primary('idCalificacion');
                $table->foreign('Proveedor_idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('categoria', function(Blueprint $table)
            {
              $table->increments('idCategoria');
              $table->string('nombre')->unique();
              $table->string('descripcion')->default('');
              $table->integer('Evento_idEvento');

              $table->primary('idCategoria');
              $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('proveedor', function(Blueprint $table)
            {
              $table->increments('idProveedor');
              $table->string('nombre')->default('');
              $table->string('descripcion')->default('');
              $table->binary('foto')->default('');
              $table->string('direccion')->default('');
              $table->string('correoElectronico')->default('');
              $table->string('telefono')->default('');
              $table->integer('precio')->default('');

              $table->primary('idProveedor');
            });

            Schema::create('figura', function(Blueprint $table)
            {
              $table->increments('idFigura');
              $table->binary('imagen')->default('');

              $table->primary('idFigura');
            });

            Schema::create('objeto', function(Blueprint $table)
            {
              $table->increments('idObjeto');
              $table->integer('Evento_idEvento');
              $table->double('posicionX')->default('');
              $table->double('posicionY')->default('');
              $table->double('tamano')->default('');
              $table->integer('Figura_idFigura');

              $table->primary('idObjeto');
              $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('Figura_idFigura')->references('idFigura')->on('figura')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('invitado', function(Blueprint $table)
            {
              $table->string('correo')->unique();
              $table->string('estado')->default('');
              $table->increments('idInvitado');
              $table->string('nombre')->default('');
              $table->integer('Objeto_idOBjeto');
              $table->integer('Regalo/Aporte_idRegalo/Aporte');
              $table->integer('Evento_idEvento');

              $table->primary('idInvitado');
              $table->foreign('Objeto_idOBjeto')->references('idObjeto')->on('objeto')->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('Regalo/Aporte_idRegalo/Aporte')->references('idRegalo/Aporte')->on('regalo/aporte')->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('regalo/aporte', function(Blueprint $table)
            {
              $table->string('descripcion')->default('');
              $table->increments('idRegalo/Aporte');
              $table->string('nombreRegalo/Aporte')->default('');
              $table->integer('Evento_idEvento');
              $table->integer('Invitado_idInvitado');

              $table->primary('idRegalo/Aporte');
              $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('Invitado_idInvitado')->references('idInvitado')->on('invitado')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('to-do', function(Blueprint $table)
            {
                $table->increments('idItem');
                $table->string('nota')->default('');
                $table->date('fecha')->default('');
                $table->string('estado')->default('');
                $table->integer('Evento_idEvento');

                $table->primary('idItem');
                $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            });

            /** TABLAS QUE NO SE SI VAN **/

            Schema::create('etiquetado', function(Blueprint $table)
            {
                $table->integer('Proveedor_idProveedor')->default('');
                $table->integer('Categoria_idCategoria')->default('');

                $table->primary(array('Proveedor_idProveedor','Categoria_idCategoria'));
                $table->foreign('Proveedor_idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('Categoria_idCategoria')->references('idCategoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('situacionProveedor', function(Blueprint $table)
            {
                $table->integer('Evento_idEvento');
                $table->integer('Proveedor_idProveedor');
                $table->string('situacion')->default('');

                $table->primary(array('Proveedor_idProveedor','Evento_idEvento'));
                $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('Proveedor_idProveedor')->references('idProveedor')->on('proveedor')->onDelete('cascade')->onUpdate('cascade');
            });

            Schema::create('permisosEvento', function(Blueprint $table)
            {
                $table->integer('Usuario_username');
                $table->integer('Evento_idEvento');
                $table->string('tipoUsuario')->default('');

                $table->primary(array('Usuario_username','Evento_idEvento'));
                $table->foreign('Usuario_username')->references('username')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('Evento_idEvento')->references('idEvento')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
        Schema::drop('evento');
        Schema::drop('tipoEvento');
        Schema::drop('calificacion');
        Schema::drop('categoria');
        Schema::drop('proveedor');
        Schema::drop('figura');
        Schema::drop('objeto');
        Schema::drop('invitado');
        Schema::drop('regalo/aporte');
        Schema::drop('to-do');
        Schema::drop('etiquetado');
        Schema::drop('situacionProveedor');
        Schema::drop('permisosEvento');
    }
}
