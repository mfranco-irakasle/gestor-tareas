<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor Tareas Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto">
            <a href="{{ route('projects.index') }}" class="font-bold text-xl text-blue-600">GestorPro</a>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
