@extends('app')

@section('title', '完了タスク一覧')

@section('content')
@include('flush_message')
<div class="container my-5 px-5">
    @foreach ($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $task->name }}</h5>
                <p class="card-text">{{ $task->description }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
