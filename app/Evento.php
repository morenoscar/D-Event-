<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Evento extends Model
{
  public $timestamps = false;
  public $incrementing = true;
  protected $table = 'evento';
  // BORRAR TipoEvento_idTipoEvento
  protected $fillable = ['descripcion','estado','fechaFin','fechaInicio','horaFin','horaInicio','nombre','presupuesto','direccion','recordatorio','TipoEvento_idTipoEvento','foto'];
  protected $primaryKey = 'idEvento';

  /**
  * The users that belong to the event.
  */

  public static function buscarUsuarioEmail($email){
    $user = DB::table('usuario')->where('correo',$email)->first();
    return $user;
  }

  public static function nuevoColaborador($user,$idEvento){
    DB::table('permisosEvento')->insert(['Usuario_username'=>$user->username, 'Evento_idEvento'=>$idEvento,'tipoUsuario'=>'COLABORADOR']);
  }

  public static function buscarInvitados($idEvento){
    $guests = DB::table('invitado')->where('Evento_idEvento',$idEvento)->get();
    return $guests;
  }

  public static function colaboradores($idEvento){
    //$colaboradores = DB::table('permisosevento')->where('Evento_idEvento',$idEvento)->where('tipoUsuario','COLABORADOR')->get();
    $colaboradores = Usuario::whereHas('eventos', function ($query) use($idEvento) {
    $query->where('tipoUsuario','COLABORADOR');
    $query->where('Evento_idEvento',$idEvento);
    })->get();
    return $colaboradores;
  }
  public static function eliminarColaborador($username,$idEvento){
    DB::table('permisosEvento')->where('Usuario_username',$username)->where('Evento_idEvento',$idEvento)->delete();
  }

  public function usuarios()
  {
    return $this->belongsToMany('App\Usuario', 'permisosEvento','Evento_idEvento', 'Usuario_username')->withPivot('tipoUsuario');
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
