<?php

class TasklistsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lists = TaskList::all();

		return Response::json(['lists' => $lists->toArray()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = TaskList::validation();

		if ($validation->fails())
		{
		    return $validation->errors();
		}
		$task = TaskList::createTask();

		return Response::json(['task' => $task->toArray()]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = TaskList::find($id);

		if ($task) {
		    return Response::json(['task' => $task->toArray()]);
		}

		return 'Doesn\'t Exists';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$list = TaskList::find($id);
		$validation = TaskList::validation();

		if ($validation->fails()) {
			return Response::json(['errors' => $validation->errors()->toArray()]);
		}
		$list = TaskList::updateTask($list);

		return Response::json(['task' => $list->toArray()]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task = TaskList::find($id);

		if ($task) {
		    $task->delete();

		    return 'Task Deleted.';
		}

		return 'Task Doesn\'t Exists';
	}

}
