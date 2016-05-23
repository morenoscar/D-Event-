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
    $invitados = Evento::buscarInvitados($idEvento);
    return view('pages.home.invitado',compact('currentEvent','currentUser','invitados'));
  }

  public function store(Request $request)
  {

    //$this->validate($request, $this->rulesRegister, $this->messages);

    Invitado::create(array(
      'correo' => Input::get('correo'),
      'estado' => 'NO_CONFIRMADO',
      'nombre' => Input::get('nombre'),
      'Evento_idEvento' => 3,
      'Objeto_idObjeto' => 1,
      'RegaloAporte_idRegaloAporte' => 1,
    ));

    $data['nombre'] = Input::get('nombre');
    $data['correo'] = Input::get('correo');
    $data['evento'] = Input::get('idEvento');

    Mail::send('mails.register',['data' => $data],function($mail) use ($data){
      $mail->subject('Confirma tu cuenta');
      $mail->to($data['correo'],$data['nombre']);
    });
    return redirect('/');
  }
}
