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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/user/{id?}', function($id = null)
{
	if($id)
	{
		$user = array (
			'id' => $id,
			'name' => 'Ricardo Augusto Isernhagen',
			'email' => 'ricardo.isernhagen@gmail.com',
			);

		return View::make('user.get')
		-> with('user', $user);
	}
	else
	{
		return View::make('user.list');
	}
	
});