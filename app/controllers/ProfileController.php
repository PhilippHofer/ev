<?php

class ProfileController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
    {
        return View::make('profile');
    }

	

	public function postIndex()
	{
        /* Delete all groups of current user */
		$groups = Input::get('group');
        Auth::user()->groups()->sync($groups);
        
	    return View::make('profile');
	}
}
