<?php

use App\Http\Requests\TaskRequest;
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

Route::get('/tasks/{task}', function (Task $task) {

    return view("show", [
        'task' => $task,
    ]);
})->name('task.show');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view("edit", [
        'task' => $task,
    ]);
})->name('task.edit');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('task.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');

})->name('task.update');