<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index($id)
    {
        return Task::where('user_id', $id)->get();
    }

    public function store(TaskRequest $request, Task $task)
    {
        $task->fill($request->all());
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('tasks.index')
            ->with(['status' => 'Added new task']);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

}
