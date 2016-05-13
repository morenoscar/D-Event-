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
  /*
  | Route UsuarioController
  */
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
  Route::post('/home/{currentUser}',['middleware' => 'auth','EventoController@store']);
});
