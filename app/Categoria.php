<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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
    return $this->belongsToMany('App\Proveedor', 'etiquetado', 'Categoria_idCategoria', 'Proveedor_idProveedor');
  }

  /**
  * Get the post that owns the comment.
  */
  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }

  public function misProveedoresCarrito($idCategoria){
    $proveedores = Proveedor::whereHas('categoriasSituacion', function ($query) use($idCategoria) {
    $query->where('situacionProveedor.idCategoria',$idCategoria);
    $query->where('situacion','CARRITO_COMPRAS');
    })->get();
    return $proveedores;
  }

  public static function misProveedores($idCategoria){
    $proveedores = Proveedor::whereHas('categoriasSituacion', function ($query) use($idCategoria) {
    $query->where('situacionProveedor.idCategoria',$idCategoria);
    $query->where('situacion','COTIZACION');
    })->get();
    return $proveedores;
  }

  public static function proveedores($idCategoria){
    $proveedores = Proveedor::whereHas('categoriasEtiquetado', function ($query) use($idCategoria) {
    $query->where('etiquetado.Categoria_idCategoria',$idCategoria);
    })->get();
    return $proveedores;
  }

  public static function eliminarSituacion($idCategoria,$idProveedor){
    DB::table('situacionProveedor')->where('idCategoria',$idCategoria)->where('idProveedor',$idProveedor)->delete();
  }
}
