@extends('layouts.app')
  
@section('title', 'The List of Tasks')

@section('content')
<div>
  
  @forelse ($tasks as $task)
    <div>
        <a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <p>No tasks available.</p>
  @endforelse
</div>
@endsection