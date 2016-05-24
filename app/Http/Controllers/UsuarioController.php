<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// Validator
use Validator;
use Hash;
use Illuminate\Support\Facades\Input;
use App\Usuario;
use App\TipoEvento;
use App\Evento;
// Auth
use Auth;
use Session;
use DB;
use Mail;

class UsuarioController extends Controller
{
  protected $rulesRegister = [
    'apellido' => ['required'],
    'correo' => ['required','unique:usuario,correo','email'],
    'nombre' => ['required'],
    'password' => ['required','min:6'],//,'regex:/[A-Z]^[a-zA-Z0-9!$#%]+$/'],
    'username' => ['required','unique:usuario,username'],
    'copypassword' => ['required','same:password']
  ];
  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
    'unique' => 'Ese :attribute ya ha sido tomado',
    'same' => 'Las contraseñas son diferentes',
    'min' => 'El tamaño minimo de la contraseña son 6 caracteres',
    'regex' => 'La contraseña debe comenzar con una mayuscula'
  );

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

public function index()
{
  return view('pages.pre-home.register');
}

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

public function showUser()
{
  return view('pages.home.userProfile')->with('currentUser',Auth::user());
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

  Usuario::create(array(
    'nombre' => Input::get('nombre'),
    'apellido' => Input::get('apellido'),
    'correo' => Input::get('correo'),
    'username' => Input::get('username'),
    'password' => Hash::make(Input::get('password')),
  ));
  return redirect('/signin');
}

  public function showHome($user)
  {
    $currentUser = Usuario::find($user);
    if(is_null($currentUser)){
      return redirect('/signin');
    }
    if(Auth::user()->username == $currentUser->username){
      $eventTypes=TipoEvento::obtenerTipos();
      $misEventos=Usuario::misEventos(Auth::user()->username);
      return view('pages.home.userHome',compact('currentUser','eventTypes','misEventos'));
    }
    else{
      return redirect('/signin');
    }
  }

  public function showCollaborations($user)
  {
      $currentUser = Usuario::find($user);
      $colaboraciones=Usuario::colaboraciones(Auth::user()->username);
      return view('pages.home.colaboraciones',compact('currentUser','colaboraciones'));
  }

public function showLogin()
{
  return view('pages.pre-home.signin');
}

public function doLogin()
{
  $userdata = array(
    'username' => Input::get('username'),
    'password' => Input::get('password'),
  );
  if (Auth::attempt($userdata))
  {
    return redirect('/home/'.Input::get('username'));
  }
  else {
    $errors = new MessageBag(['password' => ['El correo o la contraseña son invalidos']]);
    return redirect()->back()->withErrors($errors)->withInput(Input::except('password'));
  }
}

public function edit()
{
  $usuario = Auth::user();
  $nombre = Input::get('nombre');
  $apellido = Input::get('apellido');
  $correo = Input::get('correo');
  $username = Input::get('username');
  if (!empty(Input::file('foto')))
  {
    $destinationPath = public_path().'/img/profile';
    $fileName = $usuario->username.'.png';
    $foto = '/img/profile/'.$usuario->username.'.png';
    Input::file('foto')->move($destinationPath, $fileName);
    $usuario->foto = $foto;
  }
  if($nombre != '')
    $usuario->nombre = $nombre;
  if($apellido != '')
    $usuario->apellido = $apellido;
  if($correo != '')
    $usuario->correo = $correo;
  if($username != '')
    $usuario->username = $username;
  $usuario->save();
  return redirect('/informacion');

}

public function delete()
{
  Usuario::destroy(Auth::user()->username);
  return redirect('/');
}

public function doLogout()
{
  Auth::logout();
  Session::flush();
  return redirect('/signin');
}

public function filterEvent(Request $request)
{
  $currentUser = Usuario::find(Auth::id());
  $misEventos = Evento::filterEvent(Input::get('query'));
  $eventTypes=TipoEvento::obtenerTipos();
  return view('pages.home.userHome',compact('currentUser','eventTypes','misEventos'));
}

public function historial()
{
  $eventFinish = Evento::getEventFinish(Auth::id());
  $currentUser = Usuario::find(Auth::id());
  return view('pages.home.historial',compact('currentUser','eventFinish'));
}

}
