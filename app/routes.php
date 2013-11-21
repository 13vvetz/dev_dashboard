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

Route::get('users', function()
{
//    return View::make('users');
    $users = User::all();

    return View::make('users')->with('users', $users);
});

// New login form stuff
Route::get('/', array('before' => 'auth' ,function()
{
    return 'Hello, '.Auth::user()->email.'!';
}));

Route::get('/login', function()
{
    return View::make('login');
});

Route::post('/login', function()
{
    // Validation? Not in my quickstart!
    // No, but really, I'm a bad person for leaving that out
    Auth::attempt( array('email' => Input::get('email'), 'password' => Input::get('password')) );

    return Redirect::to('/');
});
