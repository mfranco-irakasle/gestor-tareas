<?php


use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

// 1. Rutas completas de Proyectos (index, create, store, show, edit, update, destroy)
Route::resource('projects', ProjectController::class);

// 2. Rutas para Tareas (Solo necesitamos store, update y destroy)
// Las tareas se crean desde la vista de Project, por eso no necesitamos 'index' o 'create' propio
Route::resource('tasks', TaskController::class)->only(['store', 'update', 'destroy']);
