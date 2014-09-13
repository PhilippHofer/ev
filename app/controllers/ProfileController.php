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
		$this->removeAllGroups();
		$groups_checked = Input::get('group');
		if(is_array($groups_checked))
		{
			foreach($groups_checked as $group){
				$this->addGroup($group);
			}
		}


	    return View::make('profile');
	}

	private function addGroup($group){
		$user_id = Auth::user()->id;

		$groupEntry = new UserGroup;
		$groupEntry->user_id = $user_id;
		$groupEntry->group_id = $group;
		$groupEntry->activated = 1;

		$groupEntry->save();
	}

	private function removeAllGroups(){
		$user_id = Auth::user()->id;
		$groups = UserGroup::where('user_id', '=', $user_id)->delete();
	}
}
