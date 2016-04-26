<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
  protected $table = 'toDo';
  protected $fillable = ['nota','fecha','estado'];
  // FALTA LA LLAVE FORANEA
  protected $primaryKey = 'idItem';
}
