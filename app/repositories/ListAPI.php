<?php 

/**
* Lists API
*
* Some CURL Request examples here https://gist.github.com/mogetutu/5389530
*/
class ListAPI implements ListInterface
{
    /**
     * Lists Validation
     * @return object
     */
    public function validation()
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
     * Create New Task of user in session
     * @return Response
     */
    public function createList()
    {
        $newList = new TaskList;
        $validation = self::validation();

        if ($validation->fails())
        {
            return Response::json(['errors' => $validation->errors()->toArray()]);
        }

        $newList->user_id = Auth::user()->id;
        $newList->name = Input::get('name');

        $newList->save();

        return Response::json(['list' => $newList->toArray()]);
    }

    /**
     * Update User's List item
     * @param  int $id List ID
     * @return JSON
     */
    public function updateList($id)
    {
        $task = TaskList::find($id);
        // Update Task
        if ($task->user_id == Auth::user()->id) {
            $validation = self::validation();

            if ($validation->fails()) {
                return Response::json(['errors' => $validation->errors()->toArray()]);
            }

            $task->name = Input::get('name');
            $task->save();

            return Response::json(['task' => $task->toArray()]);
        }

        return Response::json(['error' => 'Access NOT Authorized!']);

    }

    /**
     * List All Lists of authorized User
     * @return JSON
     */
    public function getAllListsByUser()
    {
        $lists = TaskList::whereUserId(Auth::user()->id)->get();
        if (Auth::guest()) {
            return Response::json(['error' => 'UnAuthorized Access!']);
        }

        return Response::json(['lists' => $lists->toArray()]);

    }

    /**
     * Get one authorized user list by id
     * @param  int $id List ID
     * @return JSON
     */
    public function getListByUser($id)
    {
        // First check if list exists then if it belongs to the user
        $list = TaskList::find($id);

        if ($list) {
            if ($list->user_id == Auth::user()->id) {
                return Response::json(['list' => $list->toArray()]);
            }
            return Response::json(['error' => 'Access NOT Authorized!']);
        }

        return json_encode(['error' => "List Doesn't Exists"]);
    }

    /**
     * Delete an Authorized user's List
     * @param  int $id List ID
     * @return JSON
     */
    public function deleteUserList($id)
    {
        $list = TaskList::find($id);

        if ($list) {
            if ($list->user_id == Auth::user()->id) {
                $list->delete();

                return Response::json(['message' => 'List Deleted.']);
            }

            return Response::json(['error' => 'UnAuthorized Access!']);
        }

        return json_encode(['error' => "List Doesn't Exists!"]);
    }
}
