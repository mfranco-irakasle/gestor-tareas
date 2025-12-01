<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /** Muestra lista de proyectos */
    public function index()
    {
        // Obtenemos proyectos paginados (10 por página) ordenados por fecha
        $projects = Project::latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    /** Muestra formulario de creación */
    public function create()
    {
        return view('projects.create');
    }

    /** Guarda el proyecto en BBDD */
    public function store(Request $request)
    {
        // 1. Validar
        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'nullable',
            'deadline' => 'nullable|date',
            'status' => 'required|in:pending,active,completed'
        ]);

        // 2. Crear (asignando un user_id fijo por simplicidad, o auth()->id())
        $validated['user_id'] = 1;

        Project::create($validated);

        // 3. Redirigir
        return redirect()->route('projects.index')->with('success', 'Proyecto creado!');
    }

    /** Muestra un proyecto específico y sus tareas */
    public function show(Project $project) {
        $project->load('tasks');
        return view('projects.show', compact('project'));
    }

    /** NUEVO: Muestra formulario de edición */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /** NUEVO: Actualiza en BBDD */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'nullable',
            'deadline' => 'nullable|date',
            'status' => 'required|in:pending,active,completed'
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')
                         ->with('success', 'Proyecto actualizado correctamente');
    }

    /** NUEVO: Elimina el proyecto */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
                         ->with('success', 'Proyecto eliminado');
    }
}
