@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Header del Proyecto -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $project->title }}</h1>
                <p class="text-gray-600">{{ $project->description }}</p>
                <span class="inline-block mt-2 px-3 py-1 text-sm rounded-full {{ $project->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('projects.edit', $project) }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">Editar</a>

                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Sección Tareas -->
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-xl font-bold mb-4">Tareas</h3>

        <!-- Formulario Nueva Tarea -->
        <form action="{{ route('tasks.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <input type="text" name="name" placeholder="Nueva tarea..." class="flex-1 border p-2 rounded" required>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Añadir</button>
        </form>

        <!-- Lista de Tareas -->
        <ul class="space-y-3">
            @forelse($project->tasks as $task)
                <li class="flex items-center justify-between p-3 bg-gray-50 rounded border {{ $task->is_completed ? 'opacity-50' : '' }}">
                    <div class="flex items-center gap-3">
                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="w-5 h-5 border rounded flex items-center justify-center {{ $task->is_completed ? 'bg-green-500 border-green-500 text-white' : 'border-gray-400' }}">
                                @if($task->is_completed) &#10003; @endif
                            </button>
                        </form>
                        <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->name }}</span>
                    </div>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-600">&times;</button>
                    </form>
                </li>
            @empty
                <li class="text-gray-500 text-center italic">No hay tareas en este proyecto.</li>
            @endforelse
        </ul>
    </div>

</div>
@endsection
