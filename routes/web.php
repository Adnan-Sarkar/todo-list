<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest('created_at')->get(),
    ]);
})->name('task.index');

Route::get('/tasks/{id}', function ($id) {

    return view("show", [
        'task' => \App\Models\Task::findOrFail($id),
    ]);
})->name('task.show');
