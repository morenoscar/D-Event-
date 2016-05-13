<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table = 'categoria';
  protected $fillable = ['nombre','descripcion'];
  protected $primaryKey = 'idCategoria';

  /**
  * The roles that belong to the user.
  */
  public function proveedores()
  {
    return $this->belongsToMany('App\Proveedor', 'Etiquetado', 'Proveedor_idProveedor', 'Categoria_idCategoria');
  }

  /**
  * Get the post that owns the comment.
  */
  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }
}
