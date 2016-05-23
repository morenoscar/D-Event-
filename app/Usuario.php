<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Usuario extends Authenticatable //extends Model
{
  public $timestamps = false;
  public $incrementing = false;
  protected $table = 'usuario';
  //protected $fillable = ['apellido', 'correo','direccion','fechaNacimiento','foto','nombre','password','username'];
  protected $primaryKey = 'username';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'apellido', 'correo','direccion','fechaNacimiento','foto','nombre','password','username',
  ];

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $hidden = [
    'password','remember_token',
  ];

  public static function misEventos($username){
    $eventos = Evento::whereHas('usuarios', function ($query) use($username) {
    $query->where('tipoUsuario','CREADOR');
    $query->where('Usuario_username',$username);
    })->get();
    return $eventos;
  }
  public static function tipoUsuario($username,$idEvento){
    $tipo = DB::table('permisosEvento')->where('Usuario_username',$username)->where('Evento_idEvento',$idEvento)->where('tipoUsuario','CREADOR')->first();
    if(is_null($tipo)){
      $tipo='COLABORADOR';
      return $tipo;
    }
    else{
      $tipo='CREADOR';
      return $tipo;
    }
  }
  public static function colaboraciones($username){
    $eventos = Evento::whereHas('usuarios', function ($query) use($username) {
    $query->where('tipoUsuario','COLABORADOR');
    $query->where('Usuario_username',$username);
    })->get();
    return $eventos;
  }
  /**
  * The roles that belong to the user.
  */
  public function eventos()
  {
    return $this->belongsToMany('App\Evento', 'permisosEvento','Usuario_username','Evento_idEvento')->withPivot('tipoUsuario');
  }
  public function agregarPermisosEvento($idEvento)
  {
    // PARA LLENAR VARIOS ES CON sync
    return $this->eventos()->attach($idEvento,array('tipoUsuario' => 'CREADOR'));
  }


}
