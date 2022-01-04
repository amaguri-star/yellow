<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index($id)
    {
        return Task::where('user_id', $id)->get();
    }

    public function store(TaskRequest $request, Task $task, $id)
    {
        $task->fill($request->all());
        $task->user_id = $id;
        $task->save();
        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

}
