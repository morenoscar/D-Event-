<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
  protected $table = 'tipoEvento';
  protected $fillable = 'nombre';
  protected $primaryKey = 'idTipoEvento';
}
