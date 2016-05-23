<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
  public $timestamps = false;
  protected $table = 'invitado';
  // FALTA MIRAR LAS LLAVES FORANEAS
  protected $fillable = ['correo','estado','nombre','Evento_idEvento'];
  protected $primaryKey = 'idInvitado';

  /**
  * Get the post that owns the comment.
  */
  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }

  /**
  * Get the post that owns the comment.
  */
  public function objeto()
  {
    return $this->belongsTo('App\Objeto');
  }

  /**
    * Get the phone record associated with the user.
    */
   public function regaloAporte()
   {
       return $this->hasOne('App\RegaloAporte');
   }
}
