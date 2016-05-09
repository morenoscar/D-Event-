<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App;
use App\TipoEvento;


class TipoEventoController extends Controller
{
  public function getTipoEvento($nombre)
  {

    //return view('pages.home.evento')->with('evento',$currentEvent);
  }
}
