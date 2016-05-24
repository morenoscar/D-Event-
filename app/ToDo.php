<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
  public $timestamps = false;
  protected $table = 'toDo';
  protected $fillable = ['nota','fecha','estado','Evento_idEvento'];
  protected $primaryKey = 'idItem';

  /**
  * Get the post that owns the comment.
  */
  public static function tarjetasEvento($idEvento){
    $tarjetas = DB::table('toDo')->where('Evento_idEvento',$idEvento)->get();
    return $tarjetas;
  }

  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }
}
