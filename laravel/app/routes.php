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

/**Route::get('/user/{id?}', function($id = null)
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
	
});**/

Route::get('/users', function()
{
	//lista todos os usuários
	$users = User::all();

	return View::make('user.list')
		->with('users', $users);

});

Route::get('/users/create', function()
{
	//criam um novo usuário
	return 'Criando novo usuário';
});

Route::get('/users/read/{id}', function($id)
{
	//lista usuários de id = $id
	return "Listando usuário $id";
});

Route::get('/users/update/{id}', function($id)
{
	//lista usuários de id = $id
	return "Atualizando usuário $id";
});

Route::get('/users/delete/{id}', function($id)
{
	//atualiza usuários de id = $id
	return "Excluindo usuário $id";
});

