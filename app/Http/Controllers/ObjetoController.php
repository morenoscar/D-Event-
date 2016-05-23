<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Evento;
use App\Usuario;

class ObjetoController extends Controller
{
    public function consultarPlano()
    {
      $currentEvent = new Evento();
      $currentUser = new Usuario();
      return view('pages.home.drag',compact('currentEvent','currentUser'));
    }
}
