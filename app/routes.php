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

Route::controller('/logout', 'LogoutController');

Route::controller('/changeGroup', 'GroupController');

Route::get('/admin', function()
{
	return View::make('admin');
})->before('auth');

Route::get('/insertVocab', function()
{
    $word = new Word;
    $word->group_id = $_GET['group'];
    $word->english = $_GET['english'];
    $word->german = $_GET['german'];
    $word->save();
    return View::make('admin');
})->before('auth');


Route::post('/uploadCsv', function()
{
    $data = $_POST['data'];
    $fileName = $_POST['fileName'];
    $serverFile = time().$fileName;
    $fp = fopen('/uploads/'.$serverFile,'w'); //Prepends timestamp to prevent overwriting
    fwrite($fp, $data);
    fclose($fp);
    $returnData = array( "serverFile" => $serverFile );

    return View::make('admin');
})->before('auth');

Route::post('/changePw', function()
{
    $oldPW = Input::get("oldPW");
    $newPW1 = Input::get("newPW1");
    $newPW2 = Input::get("newPW2");

    $name = Auth::user()->username;

    if(Auth::validate(array('username' => $name, 'password' => $oldPW )))
    {
        if(strlen($newPW1) < 4) {
            return Redirect::intended('profile')->with('status', 'error')->with('message', 'Das Passwort muss mindestens 4 Zeichen lang sein');
        }
        if(strcmp($newPW1, $newPW2) == 0) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($newPW1);
            $user->save();
            return Redirect::intended('profile')->with('status', 'success')->with('message', 'Das Passwort wurde erfolgreich geändert');
        } else {
            return Redirect::intended('profile')->with('status', 'error')->with('message', 'Die eingegebenen Passwörter stimmen nicht überein');
        }

    } else {
        return Redirect::intended('profile')->with('status', 'error')->with('message', 'Das eingegebene Passwort stimmt nicht');
    }

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

/* return all words of the specified groups in json*/
Route::get('json/words', 'JsonController@allWords');

/* return all words of the groups, the current user has selected as json*/
Route::get('json/words/box/{box?}', 'JsonController@userWords')->before('auth')->where('box', '[0-9]+');
