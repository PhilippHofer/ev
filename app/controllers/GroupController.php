<?php

class GroupController extends BaseController {

	public function getIndex()
    {
        $action = $_GET['action'];
       

        if($action == "update"){
        	$to = $_GET['to'];
        	$id = $_GET['id'];
			$groupEntry = Group::find($id);
			$groupEntry->name = $to;

			$groupEntry->save();
        }else if($action == "delete"){
        	$id = $_GET['id'];
        	$groupEntry = Group::find($id);
        	$groupEntry->delete();
        }else if($action == "insert"){
        	$name = $_GET['name'];

        	$group = new Group;
			$group->name = $name;
			$group->save();
        }

        return View::make('admin');
    }

	

	
}
