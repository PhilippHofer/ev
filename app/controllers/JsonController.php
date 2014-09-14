<?php

class JsonController extends BaseController {


    public function allWords() {
        $group = Input::get('group_id');
        if($group == null){
            return Word::all();
        } else {
            if(is_array($group)) {
                $groups = JsonController::array_to_sql_list($group);
                return Word::whereRaw("group_id in $groups")->get();
            }
            return Word::where('group_id', '=', $group)->get();
        }
    }

    public function userWords($box = null) {
        $groups = Auth::user()->groups;
        $words = new \Illuminate\Database\Eloquent\Collection;
        foreach($groups as $group) {
            foreach($group->words as $word)
            {
                $words->add($word);
            }
        }

        $userWords = Auth::user()->words;
        /* replace all the words, which are already in the list and also in user_word, to get the correct statistic numbers */
        $userWords->each(function($word) use ($words)
        {
            if($words->contains($word->id)){
                $words->find($word->id)->pivot = $word->pivot;
            }
        });

        $words = $this->sortById($words);
        if($box == null) {  /* if no box is selected, return all words the user has selected */
            return $words;

        } else {
            $results = new \Illuminate\Database\Eloquent\Collection;
            $words->each(function($word) use ($results, $groups, $box)
            {
                if($groups->contains($word->group_id) && $word->box == $box) {
                    $results->add($word);
                }
            });
            return $results;
        }
    }


    protected function array_to_sql_list($array) {
        return '(' . implode(',', $array) . ')';
    }

    protected function sortById($collection){
        return $collection->sortBy(function($object)
        {
            return $object->id;
        });
    }

}
