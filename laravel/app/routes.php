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
})->before('auth');

Route::controller('/login', 'LoginController');

Route::get('/admin', function()
{
	return View::make('admin');
})->before('auth');

Route::get('/learn/{mode?}', function($mode = 'menu')
{
    if($mode == 'menu'){
        return View::make('learn');
    } else if($mode =='list') {
        return View::make('learn.list');
    } else if($mode =='train') {
        return View::make('learn.train');
    } else if($mode =='practice') {
        return View::make('learn.practice');
    } else if($mode =='test') {
        return View::make('learn.test');
    } else {
        App:abort(404);
    }

})->before('auth');

Route::controller('/profile', 'ProfileController');

Route::get('/layout', function()
{
    return View::make('layout');
})->before('auth');