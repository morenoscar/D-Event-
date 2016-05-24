<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Evento;
use App\Usuario;
use Auth;

class ObjetoController extends Controller
{
    public function consultarPlano($idEvento)
    {
      $currentEvent = Evento::find($idEvento);
      $currentUser = Usuario::find(Auth::id());
      return view('pages.home.drag',compact('currentEvent','currentUser'));
    }
}
