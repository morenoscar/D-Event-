<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Evento;
use App\Usuario;
use Auth;

class ProveedorController extends Controller
{
  public function showCarritoCompras($idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find(Auth::id());
    return view('pages.home.carrito_compras',compact('currentEvent','currentUser'));
  }

  public function showCotizacion($idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find(Auth::id());
    return view('pages.home.cotizaciones',compact('currentEvent','currentUser'));
  }
}
