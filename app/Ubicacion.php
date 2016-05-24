<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
  public $timestamps = false;
  protected $table = 'ubicacion';
  // FALTAN LAS LLAVES FORANEAS
  protected $fillable = ['posicionX','posicionY','tamano'];
  protected $primaryKey = 'idUbicacion';

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
