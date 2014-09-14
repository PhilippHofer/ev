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
        $groups = Auth::user()->groups;
        $tmp = array();
        foreach($groups as $group) {
            array_push($tmp, $group->id);
        }
        $groupsSQL = $this->array_to_sql_list($tmp);
        $groups = $tmp;

        if($box == null) {  /* if no box is selected, return all words the user has selected */
            return Word::whereRaw("group_id in $groupsSQL")->get()->toJson();
        } else {
            if($box == 1) { /* Show all words which are not in the user_word table or have the box_level 1 in the user_word table*/
                // All the words the user has selected
                $groups = Auth::user()->groups;
                $words = new \Illuminate\Database\Eloquent\Collection;
                foreach($groups as $group) {
                    echo $group->name;
                    foreach($group->words as $word)
                    {
                        echo $word
                    }
                }
                return $words->toJson();
                /*
                // All words who are in the user_word table with the id of the current user
                $existingwords = Auth::user()->words;
                // filter out the words in box_level 1
                $existingwords = $existingwords->filter(function($word)
                {
                    if($word->pivot->box_level > 1)
                    {
                        return $word;
                    }
                });
                // Filter all the words who are in the user_word table and have a box_level > 1
                $words = $words->filter(function($word) use($existingwords)
                {
                    if(!$existingwords->contains($word->id)){
                        return $word;
                    }
                });
                return $words;
                */
            } else {
                $words = Auth::user()->words()->get();
                $words = $words->filter(function($word) use ($groups, $box)
                {
                   if(in_array($word->group_id, $groups) && $word->pivot->box_level == $box) {
                    return $word;
                   }
                });
                return $words->toJson();
            }
        }
    }


    protected function array_to_sql_list($array) {
        return '(' . implode(',', $array) . ')';
    }

}
