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
use Mail;

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
    'TipoEvento_idTipoEvento' => ['exists:tipoEvento,idTipoEvento']
  ];

  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
    'exists' => 'Debe seleccionar un tipo de evento'
  );

  public function showEvent($username,$idEvento)
  {
    $currentEvent=Evento::find($idEvento);
    $currentUser=Usuario::find($username);
    $tipoUsuario=Usuario::tipoUsuario($username,$idEvento);
    return view('pages.home.evento',compact('currentEvent','currentUser','tipoUsuario'));
  }

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

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, $this->rulesRegister, $this->messages);
    $fotoEvento = '/img/events/eventType'.Input::get('TipoEvento_idTipoEvento').'.png';
    $evento = Evento::create(array(
      'TipoEvento_idTipoEvento' => Input::get('TipoEvento_idTipoEvento'),
      'descripcion' => Input::get('descripcion'),
      'fechaFin' => $this->modify_date(Input::get('fechaFin')),
      'fechaInicio' => $this->modify_date(Input::get('fechaInicio')),
      'horaFin' => Input::get('horaFin'),
      'horaInicio' => Input::get('horaInicio'),
      'nombre' => Input::get('nombre'),
      'presupuesto' => Input::get('presupuesto'),
      'estado' => 'ACTIVO',
      'foto' => $fotoEvento
    ));
    $usuario = Usuario::find(Auth::id());
    $usuario->agregarPermisosEvento($evento->idEvento);
    return redirect('/home/'.$usuario->username);
  }

  public function edit(Request $request){
    $data = Input::all();
    $currentEvent = Evento::find($data['idEvento']);
    $currentUser = Usuario::find(Auth::id());
    $keys = array_keys($data);
    foreach ($keys as $key) {
      if (!empty($data[$key]) and $key!='_token') {
        if($key == 'fechaInicio' || $key == 'fechaFin')
        {
          $currentEvent->$key = $this->modify_date($data[$key]);
        }
        else {
          $currentEvent->$key = $data[$key];
        }
      }
    }
    $currentEvent->save();
    return redirect('/home/'.$currentUser->username.'/evento/'.$currentEvent->idEvento);
  }

  public function delete(Request $request){
    $currentUser = Usuario::find(Auth::id());
    Evento::destroy(Input::get('idEvento'));
    return redirect('/home/'.$currentUser->username);
  }

  public function addCollaborator(Request $request){
    $currentUser = Usuario::find(Auth::id());
    $email = Input::get('correo');
    $idEvento = Input::get('idEvento');
    $user=Evento::buscarUsuarioEmail($email);
    if(is_null($user)){
      $errors = new MessageBag(['email' => ['No existe un usuario con ese correo electronico. Se le ha enviado un correo para que se registre en D-Event.']]);

      $data['usuario'] = Usuario::find(Auth::id());
      $data['correo'] = Input::get('correo');

      Mail::send('mails.enjoyus',['data' => $data],function($mail) use ($data){
        $mail->subject('Unete a D-Event!');
        $mail->to($data['correo']);
      });

      return redirect()->back()->withErrors($errors);
    }
    else{
      Evento::nuevoColaborador($user,$idEvento);
    }
    return redirect('/home/'.$currentUser->username.'/evento/'.$idEvento);
  }

  public function cotizaciones($username,$idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser=Usuario::find($username);
    //$colaboradores=Evento::colaboradores($idEvento);
    return view('pages.home.cotizaciones',compact('currentEvent','currentUser'));
  }
  public function colaboradores($username,$idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser=Usuario::find($username);
    $colaboradores=Evento::colaboradores($idEvento);
    $tipoUsuario=Usuario::tipoUsuario($username,$idEvento);
    return view('pages.home.colaboradores',compact('currentEvent','currentUser','colaboradores','tipoUsuario'));
  }
  public function deleteCollaborator(Request $request){
    $currentUser = Usuario::find(Auth::id());
    $idEvento = Input::get('idEvento');
    $colaborador = Input::get('username');
    Evento::eliminarColaborador($colaborador,$idEvento);
    return redirect('/home/'.$currentUser->username.'/evento/'.$idEvento.'/colaboradores');
  }
}
