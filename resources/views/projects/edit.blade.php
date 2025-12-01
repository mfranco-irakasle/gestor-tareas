@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Editar Proyecto</h2>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT') <!-- Importante para updates -->

        <div class="mb-4">
            <label class="block text-gray-700">Título</label>
            <input type="text" name="title" value="{{ $project->title }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Descripción</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ $project->description }}</textarea>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Fecha Límite</label>
                <input type="date" name="deadline" value="{{ optional($project->deadline)->format('Y-m-d') }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Estado</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                    <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Activo</option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completado</option>
                </select>
            </div>
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">
            Actualizar Proyecto
        </button>
    </form>
</div>
@endsection
