<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return view('tasks.index', ['tasks' => Task::all()]);
    }
    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        Task::create(['name' => $request->name]);
        return redirect()->route('tasks.index');
    }
    public function update(Task $task) {
        $task->update(['is_completed' => true]);
        return redirect()->route('tasks.index');
    }
    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
