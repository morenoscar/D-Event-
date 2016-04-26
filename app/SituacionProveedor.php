<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacionProveedor extends Model
{
  protected $table = 'situacionProveedor';
  protected $fillable = 'situacion';
  //ESTAS PRIMARIAS TAMBIEN SON FORANEAS
  protected $primaryKey = ['Evento_idEvento','Proveedor_idProveedor'];
}
