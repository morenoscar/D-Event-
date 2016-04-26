<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegaloAporte extends Model
{
  protected $table = 'regaloAporte';
  protected $fillable = ['descripcion','nombreRegaloAporte'];
  // FALTAN LAS LLAVES FORANEAS
  protected $primaryKey = 'idRegaloAporte';
}
