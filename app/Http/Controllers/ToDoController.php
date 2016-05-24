<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Evento;
use App\Usuario;
use App\ToDo;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\MessageBag;

class ToDoController extends Controller
{
  protected $rulesRegister = [
    'nota' => ['required'],
    'fecha' => ['required'],
  ];

  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
  );

  private function modify_date($date)
  {
    $result = strtok($date,"/");
    $month = $result;
    $result = strtok("/");
    $day = $result;
    $result = strtok("/");
    $year = $result;
    if (strlen($month) == 1)
    {
      $month = '0'.$month;
    }
    if (strlen($day) == 1)
    {
      $day = '0'.$day;
    }
    return $year.'-'.$month.'-'.$day;
  }

  public function store(Request $request)
  {
    $this->validate($request, $this->rulesRegister, $this->messages);
    if(Input::get('prioridad')=='1'){
      $prioridad = 'BAJA';
    }
    if(Input::get('prioridad')=='2'){
      $prioridad = 'MEDIA';
    }
    if(Input::get('prioridad')=='3'){
      $prioridad = 'ALTA';
    }
    if(Input::get('prioridad')=='0'){
      $errors = new MessageBag(['password' => ['Debe seleccionar la prioridad']]);
      return redirect()->back()->withErrors($errors);
    }
    $item = ToDo::create(array(
      'nota' => Input::get('nota'),
      'fecha' => $this->modify_date(Input::get('fecha')),
      'Evento_idEvento' => Input::get('idEvento'),
      'estado' => 'UNCHECKED',
      'prioridad' => $prioridad,
      'nombre' => Input::get('nombre'),
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
        if($key=='fecha'){
          $item = $this->modify_date(Input::get('fecha'));
        }
        else{
        $item->$key = $data[$key];
      }
      }
    }
    $item->save();

    return redirect('/home/'.$currentUser->username.'/evento/'.Input::get('idEvento').'/toDo');
  }
}
