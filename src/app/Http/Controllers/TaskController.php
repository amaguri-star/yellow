<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(TaskRequest $request, Task $task)
    {
        $task->fill($request->all());
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('tasks.index')
            ->with(['status' => '完了したタスクを追加しました']);
    }

    public function create()
    {
        return view('create_task');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

}
