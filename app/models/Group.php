<?php

class Group extends Eloquent {

    public function users()
    {
        return $this->belongsToMany('User', 'user_group');
    }

    public function words()
    {
        return $this->hasMany('Word');
    }

}
