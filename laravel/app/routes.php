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
	return View::make('profile');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/admin', function()
{
	return View::make('admin');
});

Route::get('/learn/{mode}', function($mode)
{
	return View::make('learn');
});

Route::get('/profile', function($mode)
{
	return View::make('profile');
});