<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor Docker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
    <div class="container mx-auto mt-10 max-w-xl bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-slate-700 mb-6 text-center">Tareas en Docker 🐳</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="name" class="flex-grow rounded-md border-slate-300" placeholder="Nueva tarea..." required>
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-600">Añadir</button>
        </form>
        <ul class="space-y-3">
            @foreach ($tasks as $task)
                <li class="flex items-center justify-between p-3 rounded-md {{ $task->is_completed ? 'bg-green-50' : 'bg-slate-50' }}">
                    <span class="{{ $task->is_completed ? 'line-through text-slate-400' : '' }}">{{ $task->name }}</span>
                    <div class="flex gap-2">
                        @if (!$task->is_completed)
                            <form action="{{ route('tasks.update', $task) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="text-green-600 font-bold">✓</button>
                            </form>
                        @endif
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 font-bold">✗</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
