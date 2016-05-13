<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  public $timestamps = false;
  public $incrementing = true;
  protected $table = 'evento';
  // BORRAR TipoEvento_idTipoEvento
  protected $fillable = ['descripcion','estado','fechaFin','fechaInicio','horaFin','horaInicio','nombre','presupuesto','direccion','recordatorio','TipoEvento_idTipoEvento'];
  protected $primaryKey = 'idEvento';

  /**
  * The users that belong to the event.
  */
  public function usuarios()
  {
    return $this->belongsToMany('App\Usuario', 'permisosEvento', 'Usuario_username', 'Evento_idEvento')->withPivot('tipoUsuario');
  }

  /**
  * El evento pertenece a muchos proveedores.
  */
  public function proveedores()
  {
    return $this->belongsToMany('App\Proveedor', 'situacionProveedor', 'Proveedor_idProveedor', 'Evento_idEvento')->withPivot('situacion');
  }

  /**
  * Get the post that owns the comment.
  */
  public function tipoEvento()
  {
    return $this->belongsTo('App\TipoEvento');
  }

  /**
  * Get the comments for the blog post.
  */
  public function toDos()
  {
    return $this->hasMany('App\ToDo');
  }
  /**
  * Get the comments for the blog post.
  */
  public function regalosAportes()
  {
    return $this->hasMany('App\RegaloAporte');
  }
  /**
  * Get the comments for the blog post.
  */
  public function invitados()
  {
    return $this->hasMany('App\Invitado');
  }
  /**
  * Get the comments for the blog post.
  */
  public function objetos()
  {
    return $this->hasMany('App\Objeto');
  }
  /**
  * Get the comments for the blog post.
  */
  public function categorias()
  {
    return $this->hasMany('App\Categoria');
  }

  public function etiquetado($idProveedor)
  {
    // Falta cambiar que situacion es PARA LLENAR VARIOS ES CON sync
      $this->proveedores()->attach($idProveedor,array('situacion' => 'COTIZACION'));
  }
}
