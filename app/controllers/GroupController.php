<?php

class GroupController extends BaseController {

	public function getIndex()
    {
        $action = $_GET['action'];
        $id = $_GET['id'];

        if($action == "update"){
        	$to = $_GET['to'];
			$groupEntry = Group::find($id);
			$groupEntry->name = $to;

			$groupEntry->save();
        }else if($action == "delete"){
        	$groupEntry = Group::find($id);
        	$groupEntry->delete();
        }

        return View::make('admin');
    }

	

	
}
