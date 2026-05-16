@extends('layouts.app')

@section('title', "Ad Task")

@section('styles')
<style>
  .error-message {
    color: red;
    font-size: 0.875rem;
  }
</style>
@endsection

@section('content')
    <h1 >Create Task</h1>
    <form action="{{ route('task.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" ></textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="5" ></textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" >
                Add Task
            </button>
        </div>
    </form>
@endsection