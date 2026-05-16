@extends('layouts.app')

@section('title', "Edit Task")

@section('styles')
<style>
  .error-message {
    color: red;
    font-size: 0.875rem;
  }
</style>
@endsection

@section('content')
    <h1 >Edit Task</h1>
    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"  >{{ $task->description }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="5" >{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" >
                Update Task
            </button>
        </div>
    </form>
@endsection