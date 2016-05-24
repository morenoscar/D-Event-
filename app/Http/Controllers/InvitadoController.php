<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Usuario;
use App\Evento;
use App\Invitado;
use Auth;
use Mail;
use Validator;

class InvitadoController extends Controller
{
  protected $rulesRegister = [
    'correo' => ['required','unique:invitado,correo','email'],
    'nombre' => ['required'],
  ];
  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
    'unique' => 'Ese :attribute ya ha sido tomado',
  );

  public function confirmInvitation($currentEvent,$email)
  {
    $guest = new Invitado;
    $the_guest = $guest->select()->where('correo','=',$email)->get();

    if(count($the_guest) > 0)
    {
      echo $the_guest;
      //return redirect('/evento/'.$currentEvent.'/invitado/'.$email);
    }
    else {
      return redirect('/');
    }
  }

  public function showInvitados($idEvento)
  {
    $currentEvent = Evento::find($idEvento);
    $currentUser = Usuario::find(Auth::id());
    $tipoUsuario = Usuario::tipoUsuario($currentUser->username,$idEvento);
    $invitados = Evento::misInvitados($idEvento);
    return view('pages.home.invitado',compact('currentEvent','currentUser','invitados','tipoUsuario'));
  }

  public function store(Request $request)
  {

    $this->validate($request, $this->rulesRegister, $this->messages);

    $invitado = Invitado::create(array(
      'correo' => Input::get('correo'),
      'nombre' => Input::get('nombre'),
    ));
    $invitado->agregarInvitadosEvento(Input::get('idEvento'));
    $evento = Evento::find(Input::get('idEvento'));
    $data['nombre'] = Input::get('nombre');
    $data['correo'] = Input::get('correo');
    $data['evento'] = $evento;

    Mail::send('mails.register',['data' => $data],function($mail) use ($data){
      $mail->subject('Invitacion evento: '.$data['evento']->nombre);
      $mail->to($data['correo'],$data['nombre']);
    });
    return $this->showInvitados($evento->idEvento,null);
  }

  public function delete(Request $request)
  {
    Invitado::destroy(Input::get('idInvitado'));
    return $this->showInvitados(Input::get('idEvento'),null);
  }

  public function filterInvitado(Request $request)
  {
    $currentEvent = Evento::find(Input::get('idEvento'));
    $currentUser = Usuario::find(Auth::id());
    $tipoUsuario = Usuario::tipoUsuario($currentUser->username,Input::get('idEvento'));
    $invitados = Invitado::filterGuest(Input::get('query'),Input::get('idEvento'));
    return view('pages.home.invitado',compact('currentEvent','currentUser','invitados','tipoUsuario'));
  }
}
