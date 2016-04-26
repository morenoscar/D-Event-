<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiquetado extends Model
{
  protected $table = 'etiquetado';
  //MIRAR SI ESTO VA, ESTA TABLA SURGE DE LA RELACION
  protected $primaryKey = ['Proveedor_idProveedor','Categoria_idCategoria'];
}
