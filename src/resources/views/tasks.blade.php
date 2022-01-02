@extends('app')

@section('title', '完了タスク一覧')

@section('content')
    <Task-list :tasks="{{ $tasks }}"></Task-list>
@endsection
