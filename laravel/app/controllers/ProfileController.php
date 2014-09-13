<?php

class ProfileController extends BaseController {

	public function getIndex()
    {
        return View::make('profile');
    }


	public function postIndex()
	{
		$groups_checked = Input::get('group');
		if(is_array($groups_checked))
		{
		   echo $groups_checked;
		}
	    return View::make('profile');
	}
}
