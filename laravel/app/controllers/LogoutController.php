<?php

class LogoutController extends BaseController {

	public function getIndex()
    {
    	Auth::logout();
        return View::make('login');
    }

	

	
}
