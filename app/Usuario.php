<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    'password',
  ];

  /**
  * The roles that belong to the user.
  */
  public function eventos()
  {
    return $this->belongsToMany('App\Evento', 'permisosEvento', 'Usuario_username', 'Evento_idEvento')->withPivot('tipoUsuario');
  }


}
