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


/*
| Route EventoController
*/


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
  Route::get('/', function () {
    return view('/pages/pre-home/home');
  });
  /*
  | Route UsuarioController
  */
  Route::get('/informacion', ['middleware' => 'auth','uses'=>'UsuarioController@showUser']);
  Route::post('/informacion',['middleware' => 'auth','uses' => 'UsuarioController@edit']);
  Route::post('/informacion/eliminar',['middleware' => 'auth','uses' => 'UsuarioController@delete']);
  // route to logout an user
  Route::get('/logout', ['middleware' => 'auth','uses'=>'UsuarioController@doLogout']);
  // route to show home for the username
  // route to show the login form
  Route::get('/signin',['middleware' => 'guest','uses' => 'UsuarioController@showLogin']);
  // route to process the form
  Route::post('/signin',['uses' => 'UsuarioController@doLogin']);
  // route to show the register form
  Route::resource('/register','UsuarioController');
  Route::get('/home/{currentUser}',['middleware' => 'auth','uses' => 'UsuarioController@showHome']);
  Route::post('/home/{currentUser}',['middleware' => 'auth','uses'=>'EventoController@store']);
  Route::get('/home/{currentUser}/evento/{currentEvent}',['middleware' => 'auth','uses' => 'EventoController@showEvent']);
  Route::post('/home/{currentUser}/evento/{currentEvent}',['middleware' => 'auth','uses'=>'EventoController@edit']);
  Route::post('/home/{currentUser}/evento/{currentEvent}/eliminar',['middleware' => 'auth','uses' => 'EventoController@delete']);
  //Route::post('/home/{currentUser}/evento/{currentEvent}/añadircol',['middleware' => 'auth','uses' => 'EventoController@addCollaborator']);
  Route::get('/home/{currentUser}/colabora',['middleware' => 'auth','uses'=>'UsuarioController@showCollaborations']);
  Route::post('/home/{currentUser}',['middleware' => 'auth','uses' =>'EventoController@store']);

  //Route::get('/home/{currentUser}/evento/{currentEvent}/', array('uses' => 'EventoController@showEvent'));

//  Route::get('auth/confirm/email/{email}/confirm_token/{token}',['middleware' => 'guest','uses' => 'InvitadoController@confirmInvitation']);
  Route::get('/evento/{currentEvent}/invitado/{email}',['middleware' => 'guest','uses' => 'InvitadoController@confirmInvitation']);
Route::get('/home/{currentUser}/evento/{currentEvent}/cotizaciones',['middleware' => 'auth','uses' => 'EventoController@cotizaciones']);
Route::get('/home/{currentUser}/evento/{currentEvent}/colaboradores',['middleware' => 'auth','uses' => 'EventoController@colaboradores']);
Route::post('/home/{currentUser}/evento/{currentEvent}/colaboradores/añadir',['middleware' => 'auth','uses' => 'EventoController@addCollaborator']);
Route::post('/home/{currentUser}/evento/{currentEvent}/colaboradores/eliminar',['middleware' => 'auth','uses' => 'EventoController@deleteCollaborator']);
Route::get('/home/{currentUser}/evento/{currentEvent}/toDo',['middleware' => 'auth','uses' => 'ToDoController@ShowToDo']);
Route::post('/home/{currentUser}/evento/{currentEvent}/toDo/añadir',['middleware' => 'auth','uses' => 'ToDoController@store']);
Route::post('/home/{currentUser}/evento/{currentEvent}/toDo/eliminar',['middleware' => 'auth','uses' => 'ToDoController@delete']);
Route::post('/home/{currentUser}/evento/{currentEvent}/toDo/modificar',['middleware' => 'auth','uses' => 'ToDoController@edit']);
});
