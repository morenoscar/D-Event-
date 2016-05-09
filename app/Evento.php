<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  public $timestamps = false;
  public $incrementing = true;
  protected $table = 'evento';
  // BORRAR TipoEvento_idTipoEvento
  protected $fillable = ['descripcion','estado','fechaFin','fechaInicio','horaFin','horaInicio','nombre','presupuesto','direccion','recordatorio','TipoEvento_idTipoEvento'];
  protected $primaryKey = 'idEvento';

  /**
  * The users that belong to the event.
  */
  public function usuarios()
  {
    return $this->belongsToMany('App\Usuario', 'permisosEvento', 'Usuario_username', 'Evento_idEvento')->withPivot('tipoUsuario');
  }
}
