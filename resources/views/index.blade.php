@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')
    <div>
        <a href="{{ route('task.create') }}">Add Task</a>
    </div>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <p>No tasks available.</p>
        @endforelse

        @if ($tasks->count())
            <div>
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection