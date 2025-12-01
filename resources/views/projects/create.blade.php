@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Crear Nuevo Proyecto</h2>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Título</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Descripción</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Fecha Límite</label>
                <input type="date" name="deadline" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Estado</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="pending">Pendiente</option>
                    <option value="active">Activo</option>
                    <option value="completed">Completado</option>
                </select>
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Guardar Proyecto
        </button>
    </form>
</div>
@endsection
