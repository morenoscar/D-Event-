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
    //return view('/pages/pre-home/home');
    return view('/pages/pre-home/home');
});

//Route::get('/sigin','SigInController@sigin');
//Route::get('/register','SigInController@register');

Route::get('/home', function () {
    return view('/pages/home/userHome');
});

Route::resource('/register','UsuarioController');

// route to show the login form
Route::get('/sigin', array('uses' => 'UsuarioController@showLogin'));

// route to process the form
Route::post('/sigin', array('uses' => 'UsuarioController@doLogin'));

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
    //
});
/*
Route::auth();

Route::get('/home', 'HomeController@index');*/
