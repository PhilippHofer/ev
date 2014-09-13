<?php

class ChangePasswordController extends BaseController {

	public function getIndex()
    {
        return View::make('changePw');
    }

	

	public function postIndex()
	{
		echo "!";
		/*$pw = Input::get("pw");
		$user = User::find(1)->where(username, '=', Auth::user()->username);

		$user->password = Hash::make($pw);

		$user->save();*/
	}


	
}
