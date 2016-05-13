<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
  protected $table = 'calificacion';
  protected $fillable = ['comentario','puntaje'];
  protected $primaryKey = 'idCalificacion';

  /**
  * Get the post that owns the comment.
  */
  public function proveedor()
  {
    return $this->belongsTo('App\Proveedor');
  }
}
