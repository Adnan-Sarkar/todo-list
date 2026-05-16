@extends('layouts.app')

@section('title', isset($task) ? "Edit Task" : "Add Task")

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.875rem;
    }
  </style>
@endsection

@section('content')
  <h1>{{ isset($task) ? "Edit Task" : "Create Task" }}</h1>
  <form action="{{ 
                isset($task) ?
    route('task.update', ['task' => $task->id]) :
    route('task.store') }}" method="POST">
    @csrf
    @if(isset($task))
      @method('PUT')
    @endif
    <div>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="4">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description"
        rows="5">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <button type="submit">
        {{ isset($task) ? "Update Task" : "Add Task" }}
      </button>
    </div>
  </form>
@endsection