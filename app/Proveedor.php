<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Proveedor extends Model
{
  public $timestamps = false;
  protected $table = 'proveedor';
  protected $fillable = ['nombre','descripcion','foto','direccion','correoElectronico','telefono','precio'];
  protected $primaryKey = 'idProveedor';

  /**
  * The roles that belong to the user.
  */

  public static function addSuppplier($idCategoria,$idProveedor)
  {
    DB::table('situacionProveedor')->insert(['idCategoria'=>$idCategoria, 'idProveedor'=>$idProveedor,'situacion'=>'COTIZACION']);
  }

  public static function addCarrito($idCategoria,$idProveedor)
  {
    DB::table('situacionProveedor')->where('idCategoria',$idCategoria)->where('idProveedor',$idProveedor)->update(['situacion'=>'CARRITO_COMPRAS']);
  }

  public function categoriasSituacion()
  {
    return $this->belongsToMany('App\Categoria', 'situacionProveedor', 'idProveedor', 'idCategoria')->withPivot('situacion','precio');
  }

  /**
  * The roles that belong to the user.
  */
  public function categoriasEtiquetado()
  {
    return $this->belongsToMany('App\Categoria', 'etiquetado', 'Proveedor_idProveedor', 'Categoria_idCategoria');
  }

  /**
  * Get the comments for the blog post.
  */
  public function calificaciones()
  {
    return $this->hasMany('App\Calificacion');
  }
}
