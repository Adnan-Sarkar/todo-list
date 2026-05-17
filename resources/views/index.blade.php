@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-medium text-gray-800">Tasks</h2>
        <a href="{{ route('task.create') }}"
            class="inline-block bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">Add Task</a>
    </div>

    <div class="space-y-2">
        @forelse ($tasks as $task)
            <div class="bg-white border rounded px-4 py-3 shadow-sm">
                <a href="{{ route('task.show', ['task' => $task->id]) }}"
                    class="text-gray-900 hover:text-indigo-700 text-base {{ $task->completed ? 'line-through' : '' }}">{{ $task->title }}</a>
            </div>
        @empty
            <p class="text-gray-600">No tasks available.</p>
        @endforelse

        @if ($tasks->count())
            <div class="mt-6">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection