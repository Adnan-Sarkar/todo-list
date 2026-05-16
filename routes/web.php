<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest('created_at')->get(),
    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/{id}', function ($id) {

    return view("show", [
        'task' => Task::findOrFail($id),
    ]);
})->name('task.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'long_description' => 'nullable|string',
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null;

    $task->save();

    return redirect()->route('task.show', ['id' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('task.store');