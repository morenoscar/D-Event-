<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// Validator
use Validator;

use Hash;

use Illuminate\Support\Facades\Input;
use App\Usuario;
// Auth
use Auth;

class UsuarioController extends Controller
{
  protected $rules = [
    'apellido' => ['required'],
    'correo' => ['required','unique:usuario,correo','email'],
    'nombre' => ['required'],
    'password' => ['required'],
    'username' => ['required','unique:usuario,username'],
  ];
  protected $messages = array(
    'required' => 'El campo :attribute es obligatorio',
    'unique' => 'El campo :attribute ya ha sido tomado',
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
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, $this->rules, $this->messages);
    Usuario::create(array(
        'nombre' => Input::get('username'),
        'apellido' => Input::get('apellido'),
        'correo' => Input::get('correo'),
        'fechaNacimiento' => Input::get('fechaNacimiento'),
        'username' => Input::get('username'),
        'password' => Hash::make(Input::get('password')),
    ));
    return redirect('/sigin');

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {

  }

  public function showLogin()
  {
    return view('pages.pre-home.sigin');
  }

  public function doLogin()
  {

    // FALTA COLOCAR REGLAS
     $userdata = array(
       'username' => Input::get('username'),
       'password' => Input::get('password'),
     );
     echo Input::get('username');
     echo Input::get('password');
      if (Auth::attempt($userdata))
      {
        return redirect('/home');
      }
      else {
        echo 'No se ha podido iniciar sesión';
      }
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
  //
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
  //
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  //
}
}
