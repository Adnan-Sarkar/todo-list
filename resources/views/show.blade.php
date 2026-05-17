@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    @if ($task->completed)
        <p style="color: green;">Completed</p>
    @endif

    <div>
        <a href="{{ route('task.edit', ['task' => $task]) }}">Edit Task</a>
    </div>

    <>
        <form method="POST" action="{{ route('task.toggle-complete', ['id' => $task->id, 'task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit">
                {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
            </button>
        </form>
    </>

    <div>
        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Task</button>
        </form>
    </div>
@endsection