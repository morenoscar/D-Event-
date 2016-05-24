<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
  public $timestamps = false;
  protected $table = 'invitado';
  protected $fillable = ['correo','nombre'];
  protected $primaryKey = 'idInvitado';


  public static function filterGuest($query_,$idEvento)
  {
    $guests = Invitado::whereHas('eventos', function ($query) use($idEvento,$query_) {
      $query->where('Evento_idEvento',$idEvento);
      $query->where('invitado.nombre','LIKE','%'.$query_.'%');
    })->get();
    return $guests;
  }


  /**
  * The state of a guest in a event
  */
  public function eventos()
  {
    return $this->belongsToMany('App\Evento', 'invitadoEvento','Invitado_idInvitado','Evento_idEvento')->withPivot('estado');
  }

  /**
  * Get the post that owns the comment.
  */
  public function ubicacion()
  {
    return $this->belongsTo('App\Ubicacion');
  }

  /**
  * Get the phone record associated with the user.
  */
  public function regaloAporte()
  {
    return $this->hasOne('App\RegaloAporte');
  }

  public function agregarInvitadosEvento($idEvento)
  {
    // PARA LLENAR VARIOS ES CON sync
    return $this->eventos()->attach($idEvento,array('estado' => 'NO_CONFIRMADO'));
  }

  public function buscarInvitado($correo)
  {
    return DB::table('invitado')->where('correo',$correo)->get();
  }
}
