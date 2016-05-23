<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Evento;
use App\Usuario;
use App\ToDo;
use Illuminate\Support\Facades\Input;
use Auth;

class ToDoController extends Controller
{
  protected $rulesRegister = [
    'nota' => ['required'],
    'fecha' => ['required'],
  ];

  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
  );

  public function store(Request $request)
  {
    $this->validate($request, $this->rulesRegister, $this->messages);
    $item = ToDo::create(array(
      'nota' => Input::get('nota'),
      'fecha' => Input::get('fecha'),
      'Evento_idEvento' => Input::get('idEvento'),
      'estado' => 'UNCHECKED'
    ));
    $usuario = Usuario::find(Auth::id());
    //$usuario->agregarPermisosEvento($evento->idEvento);
    return redirect('/home/'.$usuario->username.'/evento/'.Input::get('idEvento').'/toDo');
  }

  public function showToDo($username,$idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find($username);
    $tarjetas = ToDo::tarjetasEvento($idEvento);
    $tipoUsuario=Usuario::tipoUsuario($username,$idEvento);
    return view('pages.home.toDo',compact('currentEvent','currentUser','tarjetas','tipoUsuario'));
  }

  public function delete(Request $request)
  {
    ToDo::destroy(Input::get('idItem'));
    $currentUser = Usuario::find(Auth::id());
    return redirect('/home/'.$currentUser->username.'/evento/'.Input::get('idEvento').'/toDo');
  }

  public function edit(Request $request){
    $data = Input::all();
    $currentUser = Usuario::find(Auth::id());
    $item = ToDo::find(Input::get('idItem'));
    $keys = array_keys($data);
    foreach ($keys as $key) {
      if (!empty($data[$key]) and $key!='_token' and $key!='idEvento' ) {
        $item->$key = $data[$key];
      }
    }
    $item->save();

    return redirect('/home/'.$currentUser->username.'/evento/'.Input::get('idEvento').'/toDo');
  }
}
