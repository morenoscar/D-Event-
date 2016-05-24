<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Usuario;
use App\Categoria;
use App\Evento;
use App\Proveedor;
// Auth
use Auth;
use Session;
use Mail;

class CategoriaController extends Controller
{
  public function showCarritoCompras($idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find(Auth::id());
    $categorias = Categoria::all();
    return view('pages.home.carrito_compras',compact('currentEvent','currentUser','categorias'));
  }

  public function showCotizacion($idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find(Auth::id());
    $categorias = Categoria::all();
    return view('pages.home.cotizaciones',compact('currentEvent','currentUser','categorias'));
  }

  public function deleteCarrito(Request $request){
    $idProveedor = Input::get('idProveedor');
    $idCategoria = Input::get('idCategoria');
    Categoria::eliminarSituacion($idCategoria,$idProveedor);
    return $this->showCarritoCompras(Input::get('idEvento'));
  }

  public function deleteCotizacion(Request $request){
    $idProveedor = Input::get('idProveedor');
    $idCategoria = Input::get('idCategoria');
    Categoria::eliminarSituacion($idCategoria,$idProveedor);
    return $this->showCotizacion(Input::get('idEvento'));
  }
  public function showAddSupppliers($idEvento,$idCategoria){
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find(Auth::id());
    $currentCategoria = Categoria::find($idCategoria);
    $categorias = Categoria::all();
    return view('pages.home.proveedores',compact('currentEvent','currentUser','categorias','currentCategoria'));
  }
  public function addSuppplier(Request $request){

    $categoria = Categoria::find(Input::get('idCategoria'));
    $proveedor = Proveedor::find(Input::get('idProveedor'));
    Proveedor::addSuppplier($categoria->idCategoria,$proveedor->idProveedor);
    return $this->showAddSupppliers(Input::get('idEvento'),$categoria->idCategoria);;
  }

  public function addCarrito(Request $request){
    $categoria = Categoria::find(Input::get('idCategoria'));
    $proveedor = Proveedor::find(Input::get('idProveedor'));
    Proveedor::addCarrito($categoria->idCategoria,$proveedor->idProveedor);
    return $this->showCotizacion(Input::get('idEvento'),$categoria->idCategoria);;
  }
}
