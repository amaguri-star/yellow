<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store()
    {
        // add code later
    }

    public function create()
    {
        return view('create_task');
    }

    public function show()
    {
        // add code later
    }

    public function update()
    {
        // add code later
    }

    public function destroy()
    {
        // add code later
    }

    public function edit()
    {
        // add code later
    }

}
