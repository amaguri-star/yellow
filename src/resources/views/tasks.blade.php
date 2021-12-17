@extends('app')

@section('title', '完了タスク一覧')

@section('content')
    <div class="tasks__content w-100">
        @include('flush_message')
        <div class="my-5 px-5">
            @foreach ($tasks as $task)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between">
                        <div class="card-content">
                            <h5>{{ $task->name }}</h5>
                            <p class="card-text">{{ $task->description }}</p>
                        </div>
                        <div class="delete-button">
                            @include('modal')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
