<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
  protected $table = 'calificacion';
  protected $fillable = ['comentario','puntaje'];
  protected $primaryKey = 'idCalificacion';
}
