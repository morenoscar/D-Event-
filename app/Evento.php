<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  protected $table = 'evento';
  protected $fillable = ['descripcion','estado','fechaFin','fechaInicio','horaFin','horaInicio','nombre','presupuesto','direccion','recordatorio'];
  protected $primaryKey = 'idEvento';
}
