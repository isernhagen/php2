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


/*
|--------------------------------------------------------------------------
| Restricted Routes
|--------------------------------------------------------------------------
|
| Rotas restritas, onde Ã© necessÃ¡rio se autenticar 
|
*/
Route::group(array('before' => 'auth'), function()
//Route::group(array(), function()
{
	// LISTA TODOS OS USUÃRIOS
	Route::get('/user', function()
	{
		$users = User::all();

		return View::make('user.list')
			->with('users', $users);
	});

	// EXIBE FORMULÃRIO PARA CRIAR USUÃRIO
	Route::get('/user/create', function()
	{
		return View::make('user.create');
	});

	// CRIA NOVO USUÃRIO A PARTIR DOS DADOS DO FORMULÃRIO
	Route::post('/user', function()
	{
		$user = User::create( array(
			'email'		=> Input::get('email'),
			'password'	=> Hash::make( Input::get('password') ),
		));

		return Redirect::to("/user/{$user->id}");
	});

	// EXIBE INFORMAÇÕES DE UM USUÃRIO ESPECÃFICO
	Route::get('/user/{id}', function($id)
	{
		$user = User::find($id);

		return View::make('user.show')
			->with('user', $user);
	});

	// FORMULÃRIO DE EDIÇÃO DE USUÃRIO
	Route::get('/user/{id}/edit', function($id)
	{
		$user = User::find($id);

		return View::make('user.edit')
			->with('user', $user);

	});

	// ATUALIZA INFORMAÇÕES DE ACORDO COM OS DADOS DO FORM ACIMA
	Route::put('/user/{id}', function($id)
	{
		$user = User::find($id);
		if($new_email = Input::get('email'))
		{
			$user->email = $new_email;
		}

		if($new_password = Input::get('password'))
		{
			$user->password = Hash::make($new_password);
		}

		$user->save();

		return Redirect::to("/user/{$user->id}");
	});

	// FORMULÃRIO DE REMOÇÃO DE USUÃRIO
	Route::get('/user/{id}/delete', function($id)
	{
		$user = User::find($id);

		return View::make('user.delete')
			->with('user', $user);

	});

	// REMOVE USUÃRIO
	Route::post('/user/{id}/delete/confirm', function($id)
	{
		$user = User::find($id);
		$user->delete();

		return "User deleted";
	});
});




/*
|--------------------------------------------------------------------------
| Login/Logout Routes
|--------------------------------------------------------------------------
|
| Rotas relacionadas a login e logout
|
*/

// FORMULÃRIO DE LOGIN
Route::get('/login', function()
{
	return View::make('auth.login');
});

// PROCESSA LOGIN
Route::post('/login', function()
{
	$email = Input::get('email');
	$password = Input::get('password');

	if( Auth::attempt(array('email' => $email, 'password' => $password)))
	{
		//return Redirect::intended('/profile');
		//return "Logado com sucesso";
		return Redirect::to('/user');
	}
});

// FAZ LOGOUT
Route::get('/logout', function()
{
	Auth::logout();

	return View::make('auth.logout');
});

Route::get('/profile/create', function()
{
	return View::make('profile.create');
});

Route::post('/profile', function()
{
	$name = Input::get('name');
	$celphone = Input::get('celphone');
	$photo = Input::file('photo');

	$photo_path = $photo->getRealPath();

	$profile = new Profile;

	$profile->name = $name;
	$profile->celphone = $celphone;
	$profile->photo = $photo_path;

	$profile->save();
});

/*Route::get('/teste', function()
{
	$user = new User;
	$profile = new Profile;

	$user->email = 'teste2@teste.com.br';
	$user->password = Hash::make('teste');
	$user->save();

	$profile->name = 'Teste da Silva';
	$profile->celphone = '055 555 5555';
	$profile->photo = 'storage/photos/teste.png';

	$profile->user_id = $user->id;

	$profile->save();


});*/