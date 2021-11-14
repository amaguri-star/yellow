@extends('app')

@section('title', '完了したタスクを追加')

@section('content')
    <div class="container my-5 px-5">
        @include('error_card_list')
        <form action="{{ route('tasks.store') }}" method="POST" class="text-center">
            @csrf
            <div class="md-form mb-4">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="完了したタスクを追加" required>
            </div>
            <div class="md-form mb-4">
                <textarea cols="30" rows="10" type="text" id="description" name="description" class="form-control"
                    value="{{ old('description') }}" placeholder="完了したタスクを追加" required></textarea>
            </div>
            <button class="btn btn-primary">Done!</button>
        </form>
    </div>
@endsection
