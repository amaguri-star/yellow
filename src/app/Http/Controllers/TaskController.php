<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index($user_id)
    {
        return Task::where('user_id', $user_id)->get();
    }

    public function store(TaskRequest $request, Task $task, $user_id)
    {
        $task->fill($request->all());
        $task->user_id = $user_id;
        $task->save();
        return $task;
    }

    public function update(TaskRequest $request, $user_id, $task_id)
    {
        return Task::find($task_id)->fill($request->all())->update();
    }

    public function destroy($user_id, $task_id)
    {
        return Task::find($task_id)->delete();
    }

}
