<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
  protected $table = 'figura';
  protected $fillable = ['imagen'];
  protected $primaryKey = 'idFigura';

  /**
     * Get the user that owns the phone.
     */
    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion');
    }
}
