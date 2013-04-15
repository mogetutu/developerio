<?php

class TaskList extends Eloquent {
    protected $table = 'lists';

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

    /**
     * Create New Task
     * @return Response
     */
    public static function createTask()
    {
        $newTask = new TaskList;
        $newTask->user_id = 1;
        $newTask->name = Input::get('name');

        $newTask->save();

        return $newTask;
    }

    public static function updateTask($task)
    {
        // Update Task
        $validation = self::validation();
        if ($validation->fails()) {
            return $validation->errors();
        }

        $task->name = Input::get('name');
        $task->save();

        return $task;
    }
}
