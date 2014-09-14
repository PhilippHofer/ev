<?php

class GroupController extends BaseController {

	public function getIndex()
    {
        $action = $_GET['action'];
        $id = $_GET['id'];
        $to = $_GET['to'];

        if($action == "update"){
			$groupEntry = Group::find($id);
			$groupEntry->name = $to;

			$groupEntry->save();
        }

        return View::make('admin');
    }

	

	
}
