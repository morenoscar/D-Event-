<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
  protected $table = 'tipoEvento';
  protected $fillable = 'nombre';
  protected $primaryKey = 'idTipoEvento';

  /**
     * Get the comments for the blog post.
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }
}
