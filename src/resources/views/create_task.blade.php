@extends('app')

@section('title', '完了したタスクを追加')

@section('content')
    <div class="container my-5 px-5">
        <form action="{{ route('tasks.create') }}" method="POST">
            <div class="md-form mb-4">
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name') }}" placeholder="email" required>
            </div>
        </form>
    </div>
@endsection
