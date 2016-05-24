<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public $timestamps = false;
  protected $table = 'categoria';
  protected $fillable = ['nombre','descripcion'];
  protected $primaryKey = 'idCategoria';

  /**
  * The roles that belong to the user.
  */
  public function proveedoresSituacion()
  {
    return $this->belongsToMany('App\Proveedor', 'situacionProveedor', 'idCategoria', 'idProveedor')->withPivot('situacion','precio');
  }

  /**
  * The roles that belong to the user.
  */
  public function proveedoresEtiquetado()
  {
    return $this->belongsToMany('App\Proveedor', 'etiquetado', 'idCategoria', 'idProveedor');
  }

  /**
  * Get the post that owns the comment.
  */
  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }
}
