<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable //extends Model
{
  public $timestamps = false;
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


}
