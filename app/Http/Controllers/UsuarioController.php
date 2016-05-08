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
// Auth
use Auth;

use DB;

class UsuarioController extends Controller
{
  protected $rulesRegister = [
    'apellido' => ['required'],
    'correo' => ['required','unique:usuario,correo','email'],
    'nombre' => ['required'],
    'password' => ['required'],
    'username' => ['required','unique:usuario,username'],
    'copypassword' => ['required','same:password']
  ];
  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
    'unique' => 'Ese :attribute ya ha sido tomado',
    'same' => 'Las contraseñas son diferentes'
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
      return redirect('/sigin');
  }

  public function showHome($user)
  {
    $currentUser = Usuario::find($user);
    return view('pages.home.userHome')->with('currentUser',$currentUser);
  }

  public function showLogin()
  {
    return view('pages.pre-home.sigin');
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
      $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
      return redirect()->back()->withErrors($errors)->withInput(Input::except('password'));
      //echo 'No se ha podido iniciar sesión';
      //return back()->withInput();
      //return back()->withErrors($errors)->withInput(Input::except('password'));
    }
  }
}
