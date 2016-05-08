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
use Session;
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
  /*
  public function __construct(){
    $this->middleware('auth');
  }
 */
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
      return redirect('/signin');
  }

  public function showHome($user)
  {
    $currentUser = Usuario::find($user);
    if(is_null($currentUser)){
      return redirect('/signin');
    }
    if(Auth::user()->username == $currentUser->username){
      return view('pages.home.userHome')->with('currentUser',$currentUser);
    }
    else{
      return redirect('/signin');
    }
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
      $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
      return redirect()->back()->withErrors($errors)->withInput(Input::except('password'));
    }
  }
  public function doLogout()
  {
    Auth::logout();
    Session::flush();
    return redirect('/signin');
  }
}
