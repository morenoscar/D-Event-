<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosEvento extends Model
{
  protected $table = 'permisosEvento';
  protected $fillable = ['tipoUsuario'];
  // MIRAR PORQUE ESTAS PRIMARIAS SON FORANEAS
  protected $primaryKey = ['Usuario_username','Evento_idEvento'];
}
