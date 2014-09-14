<?php

class JsonController extends BaseController {


    public function allWords() {
        $group = Input::get('group_id');
        if($group == null){
            return Word::all()->toJson();
        } else {
            if(is_array($group)) {
                $groups = JsonController::array_to_sql_list($group);
                return Word::whereRaw("group_id in $groups")->get()->toJson();
            }
            return Word::where('group_id', '=', $group)->get()->toJson();
        }
    }

    public function userWords($box = null) {
        /* find all ids of the groups the current user has selected*/
        $id = Auth::user()->id;
        $groups = User::find($id)->groups;
        $tmp = array();
        foreach($groups as $group) {
            array_push($tmp, $group->id);
        }
        $groups = JsonController::array_to_sql_list($tmp);

        if($box == null) {  /* if no box is selected, return all words the user has selected */
            return Word::whereRaw("group_id in $groups")->get()->toJson();
        } else {    /* TODO: all words of the user in the correct box */

        }
    }


    protected function array_to_sql_list($array) {
        return '(' . implode(',', $array) . ')';
    }

}
