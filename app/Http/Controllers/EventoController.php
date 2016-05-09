<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App;
use App\Evento;

use App\Usuario;


// Validator
use Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use DB;

class EventoController extends Controller
{
  protected $rulesRegister = [
    'descripcion' => ['required'],
    'fechaFin' => ['required'],
    'fechaInicio' => ['required'],
    'horaFin' => ['required'],
    'horaInicio' => ['required'],
    'nombre' => ['required'],
    'presupuesto' => ['required'],
  ];
  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
  );

  public function showEvent($username,$idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    return view('pages.home.evento')->with('evento',$currentEvent);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, $this->rulesRegister, $this->messages);
    $evento = Evento::create(array(
      'TipoEvento_idTipoEvento' => Input::get('TipoEvento_idTipoEvento'),
      'descripcion' => Input::get('descripcion'),
      'fechaFin' => Input::get('fechaFin'),
      'fechaInicio' => Input::get('fechaInicio'),
      'horaFin' => Input::get('horaFin'),
      'horaInicio' => Input::get('horaInicio'),
      'nombre' => Input::get('nombre'),
      'presupuesto' => Input::get('presupuesto'),
      'estado' => 'ACTIVO',
    ));
    $usuario = Usuario::find(Auth::id());
    $usuario->agregarPermisosEvento($evento->idEvento);
    return redirect('/');
  }
}
