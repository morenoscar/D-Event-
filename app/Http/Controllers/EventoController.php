<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use App\Evento;

class EventoController extends Controller
{
    public function showEvent($username,$idEvento)
    {
      echo $idEvento;
      $currentEvent = Evento::find($idEvento);
      return view('pages.home.evento')->with('evento',$currentEvent);
    }
}
