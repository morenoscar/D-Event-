<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
  public $timestamps = false;
  protected $table = 'proveedor';
  protected $fillable = ['nombre','descripcion','foto','direccion','correoElectronico','telefono','precio'];
  protected $primaryKey = 'idProveedor';

  /**
  * The roles that belong to the user.
  */
  public function categoriasSituacion()
  {
    return $this->belongsToMany('App\Categoria', 'situacionProveedor', 'idProveedor', 'idCategoria')->withPivot('situacion','precio');
  }

  /**
  * The roles that belong to the user.
  */
  public function categoriasEtiquetado()
  {
    return $this->belongsToMany('App\Categoria', 'etiquetado', 'idProveedor', 'idCategoria');
  }

  /**
  * Get the comments for the blog post.
  */
  public function calificaciones()
  {
    return $this->hasMany('App\Calificacion');
  }
}
