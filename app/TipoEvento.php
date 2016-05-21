<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TipoEvento extends Model
{
  protected $table = 'tipoEvento';
  protected $fillable = 'nombre';
  protected $primaryKey = 'idTipoEvento';

  /**
     * Get the comments for the blog post.
     */
    public static function obtenerTipos(){
      $eventTypes = \DB::table('tipoevento')->lists('nombre', 'idTipoEvento');
      return $eventTypes;
    }
    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }
}
