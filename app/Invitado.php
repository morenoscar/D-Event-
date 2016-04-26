<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
  protected $table = 'invitado';
  // FALTA MIRAR LAS LLAVES FORANEAS
  protected $fillable = ['correo','estado','nombre'];
  protected $primaryKey = 'idInvitado';
}
