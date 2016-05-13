<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegaloAporte extends Model
{
  protected $table = 'regaloAporte';
  protected $fillable = ['descripcion','nombreRegaloAporte'];
  // FALTAN LAS LLAVES FORANEAS
  protected $primaryKey = 'idRegaloAporte';

  /**
  * Get the post that owns the comment.
  */
  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }

  /**
     * Get the user that owns the phone.
     */
    public function invitado()
    {
        return $this->belongsTo('App\Invitado');
    }
}
