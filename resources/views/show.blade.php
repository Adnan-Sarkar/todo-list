@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="bg-white p-6 rounded">
        <div class="mb-6">
            <a href="{{ url()->previous() }}" class="text-indigo-600 hover:text-indigo-800">← Back to Tasks</a>
        </div>
        <h1 class="text-2xl font-semibold mb-2{{ $task->completed ? 'line-through' : '' }}">{{ $task->title }}</h1>
        <p class="text-gray-700 mb-2">{{ $task->description }}</p>
        @if($task->long_description)
            <p class="text-gray-700 mb-2">{{ $task->long_description }}</p>
        @endif

        <p class="text-sm text-gray-500">Created {{ $task->created_at->diffForHumans() }} . Updated
            {{ $task->updated_at->diffForHumans()}}
        </p>

        @if ($task->completed)
            <p class="inline-block text-green-700 px-2 py-1 rounded">Completed</p>
        @endif

        <div class="mt-4 flex gap-2">
            <a href="{{ route('task.edit', ['task' => $task]) }}"
                class="inline-flex items-center px-3 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">Edit</a>

            <form method="POST" action="{{ route('task.toggle-complete', ['id' => $task->id, 'task' => $task]) }}">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="inline-flex items-center bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-700">
                    {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
                </button>
            </form>

            <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 border border-red-200 text-red-700 rounded hover:bg-red-50">Delete</button>
            </form>
        </div>
    </div>
@endsection