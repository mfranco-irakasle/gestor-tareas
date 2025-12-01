@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Mis Proyectos</h1>
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Nuevo Proyecto
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
            <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">{{ $project->title }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>

                <div class="flex justify-between items-center text-sm">
                    <span class="px-2 py-1 rounded {{ $project->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $project->status }}
                    </span>
                    <a href="{{ route('projects.show', $project) }}" class="text-blue-500 hover:underline">Ver detalles →</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>
@endsection
