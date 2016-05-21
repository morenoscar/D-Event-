<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InvitadoController extends Controller
{
  public function confirmInvitation($currentEvent,$email)
  {
    $guest = new Invitado;
    $the_guest = $guest->select()->where('correo','=',$email)->get();

    if(count($the_guest) > 0)
    {
      return redirect('/evento/'.$currentEvent.'/invitado/'.$email);
    }
    else {
      return redirect('/');
    }
  }

  public function store(Request $request)
  {
    $this->validate($request, $this->rulesRegister, $this->messages);

    Invitado::create(array(
      'correo' => Input::get('correo'),
      'estado' => 'NO_CONFIRMADO',
      'nombre' => Input::get('nombre'),
      'Evento_idEvento' => Input::get('idEvento'),
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
  }
}
