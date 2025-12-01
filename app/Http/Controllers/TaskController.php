<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /** Guarda una nueva tarea vinculada a un proyecto */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id'
        ]);

        Task::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'is_completed' => false
        ]);

        // Redirige atrás (a la vista del proyecto)
        return back()->with('success', 'Tarea añadida correctamente');
    }

    /** Alterna el estado (completado/pendiente) */
    public function update(Request $request, Task $task)
    {
        // Cambiamos el booleano al valor opuesto
        $task->update([
            'is_completed' => !$task->is_completed
        ]);

        return back();
    }

    /** Elimina la tarea */
    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Tarea eliminada');
    }
}
