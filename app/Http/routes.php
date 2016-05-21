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
Desplegar image
*/
/*
Route::get('/showImage.php', function () {
  return view('/pages/home/showImage');
});
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
  Route::post('/home/{currentUser}/evento/{currentEvent}/añadircol',['middleware' => 'auth','uses' => 'EventoController@addCollaborator']);
  Route::get('/home/{currentUser}/colabora',['middleware' => 'auth','uses'=>'UsuarioController@showCollaborations']);
});
