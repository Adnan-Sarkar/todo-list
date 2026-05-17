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
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="text-indigo-600 hover:text-indigo-800">← Back</a>
    </div>
    <h1 class="text-2xl font-semibold mb-4">{{ isset($task) ? "Edit Task" : "Add Task" }}</h1>
    <form class="bg-white p-6 rounded" action="{{
        isset($task) ?
        route('task.update', ['task' => $task->id]) :
        route('task.store') }}" method="POST">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                class="mt-1 block w-full border border-gray-200 rounded px-3 py-2 bg-white">
            @error('title')
                <p class="error-message mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                class="mt-1 block w-full border border-gray-200 rounded px-3 py-2 bg-white">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error-message mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
            <textarea name="long_description" id="long_description" rows="5"
                class="mt-1 block w-full border border-gray-200 rounded px-3 py-2 bg-white">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                {{ isset($task) ? "Update Task" : "Add Task" }}
            </button>
        </div>
    </form>
@endsection