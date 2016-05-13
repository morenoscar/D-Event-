<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
  protected $table = 'objeto';
  // FALTAN LAS LLAVES FORANEAS
  protected $fillable = ['posicionX','posicionY','tamano'];
  protected $primaryKey = 'idObjeto';

  /**
  * Get the comments for the blog post.
  */
  public function invitados()
  {
    return $this->hasMany('App\Invitado');
  }

  /**
  * Get the post that owns the comment.
  */
  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }

  /**
    * Get the phone record associated with the user.
    */
   public function figura()
   {
       return $this->hasOne('App\Figura');
   }
}
