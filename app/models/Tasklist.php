<?php

class TaskList extends Eloquent {
    protected $table = 'lists';


    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function validation()
    {
        $inputs = array(
            'user_id' => 1,
            'name'    => Input::get('name'),
            );

        $rules = array(
            'user_id' => 'required|numeric|exists:users,id',
            'name'    => 'required|min:2',
            );
        return Validator::make($inputs, $rules);
    }

    public static function getAllListsByUser()
    {
        return static::all();

    }

    public static function getListByUser($userId)
    {
        // First check if list exists then if it belongs to the user
        return static::whereUserId($userId);
    }
}
