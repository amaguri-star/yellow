@extends('app')

@section('title', '完了タスク一覧')

@section('content')
    <task-list :tasks="{{ $tasks }}"></task-list>
@endsection
