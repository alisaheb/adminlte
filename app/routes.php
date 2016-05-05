<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/getlogin', function()
{
	return View::make('login.login');
});
Route::post('postlogin',array('uses' => 'login@checkLogin', 'as' => 'postlogin'));

Route::get('dashboard',array('uses'=>'DashboardController@index','as' => 'dashboard'));


/*Route::get('/login', function()
{
	Sentry::createUser(array(
		'email'     => 'john.doe@example.com',
		'password'  => 'test',
		'activated' => true,
	));
});*/
