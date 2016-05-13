<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
  protected $table = 'proveedor';
  protected $fillable = ['nombre','descripcion','foto','direccion','correoElectronico','telefono','precio'];
  protected $primaryKey = 'idProveedor';

  /**
  * El evento pertenece a muchos proveedores.
  */
  public function eventos()
  {
    return $this->belongsToMany('App\Evento', 'situacionProveedor', 'Proveedor_idProveedor', 'Evento_idEvento')->withPivot('situacion');
  }

  /**
  * The roles that belong to the user.
  */
  public function proveedores()
  {
    return $this->belongsToMany('App\Categoria', 'Etiquetado', 'Proveedor_idProveedor', 'Categoria_idCategoria');
  }
  
  /**
     * Get the comments for the blog post.
     */
    public function calificaciones()
    {
        return $this->hasMany('App\Calificacion');
    }
}
