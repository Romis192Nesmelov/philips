<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/', function() {
    if (!Auth::guest()) return redirect('/home');
    else return view('index');
});
Route::get('/end', function() {return view('endaction');});

Route::get('/confirm-registration/{token}', 'Auth\AuthController@confirmRegistration');
Route::get('/rules', function() { return view('rules'); });
Route::get('/home', 'CodeController@getIndex');
Route::controllers([
    'user' => 'UserController',
    'codes' => 'CodeController',
//    'statistics' => 'StatisticsController',
]);