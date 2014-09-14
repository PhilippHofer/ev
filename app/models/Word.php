<?php

class Word extends Eloquent {

    protected $appends = array('correct', 'wrong');

    public function group()
    {
        return $this->belongsTo('Group');
    }

    public function users()
    {
        return $this->belongsToMany('User', 'user_word')->withPivot('box_level', 'correct', 'wrong');
    }

    public function getCorrectAttribute(){
        return 0;
    }

    public function getWrongAttribute(){
        $pivot = $this->pivot;
        if($pivot == null){
            return 0;
        } else {
            return $pivot->wrong;
        }
    }

}
