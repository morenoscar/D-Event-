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
<<<<<<< HEAD
      $eventTypes = \DB::table('tipoEvento')->lists('nombre', 'idTipoEvento');
=======
      $eventTypes = DB::table('tipoEvento')->lists('nombre', 'idTipoEvento');
>>>>>>> 9ee9c6bedb56cba151f4c558ddbb79a6da840f4e
      return $eventTypes;
    }
    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }
}
