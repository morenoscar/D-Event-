<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('/pages/pre-home/home');
});

/*
| Route EventoController
*/
Route::get('/home/{currentUser}/evento/{currentEvent}', array('uses' => 'EventoController@showEvent'));

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  /*
  | Route UsuarioController
  */
  Route::get('/informacion', ['middleware' => 'auth','uses'=>'UsuarioController@showUser']);
  Route::post('/informacion',['middleware' => 'auth','uses' => 'UsuarioController@edit']);
  Route::post('/informacion/eliminar',['middleware' => 'auth','uses' => 'UsuarioController@delete']);
  // route to logout an user
  Route::get('/logout', ['middleware' => 'auth','uses'=>'UsuarioController@doLogout']);
  // route to show home for the username
  Route::get('/home/{currentUser}',['middleware' => 'auth','uses' => 'UsuarioController@showHome']);
  // route to show the login form
  Route::get('/signin',['middleware' => 'guest','uses' => 'UsuarioController@showLogin']);
  // route to process the form
  Route::post('/signin',['uses' => 'UsuarioController@doLogin']);
  // route to show the register form
  Route::resource('/register','UsuarioController');

  Route::post('/home/{currentUser}',['middleware' => 'auth','uses' =>'EventoController@store']);

  //Route::get('/home/{currentUser}/evento/{currentEvent}/', array('uses' => 'EventoController@showEvent'));

//  Route::get('auth/confirm/email/{email}/confirm_token/{token}',['middleware' => 'guest','uses' => 'InvitadoController@confirmInvitation']);
  Route::get('/evento/{currentEvent}/invitado/{email}',['middleware' => 'guest','uses' => 'InvitadoController@confirmInvitation']);

});
