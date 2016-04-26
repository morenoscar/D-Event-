<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Evento;

class EventoController extends Controller
{
    public function showEvent($idEvent)
    {
      $currentEvent = Evento::find($idEvent);
    //  return view('pages.home.userHome')->with('currentEvent',$currentEvent);
    }
}
