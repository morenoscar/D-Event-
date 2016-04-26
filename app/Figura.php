<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
  protected $table = 'figura';
  protected $fillable = ['imagen'];
  protected $primaryKey = 'idFigura';
}
