@extends('layouts.app')


@section('content')
    <div class="mt-6">
        @include('form', ['task' => $task])
    </div>
@endsection