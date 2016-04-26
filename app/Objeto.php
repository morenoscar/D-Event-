<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
  protected $table = 'objeto';
  // FALTAN LAS LLAVES FORANEAS
  protected $fillable = ['posicionX','posicionY','tamano'];
  protected $primaryKey = 'idObjeto';
}
