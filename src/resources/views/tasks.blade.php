@extends('app')

@section('title', '完了タスク一覧')

@section('content')
    <div class="w-full px-20 py-8">
        @include('flush_message')
        <div class="flex flex-col space-y-4 h-full overflow-y-scroll">
            @foreach ($tasks as $task)
                <div class="w-full px-5 py-3 shadow hover:shadow-md rounded">
                    <div class="">
                        <div class="flex justify-between">
                            <p class="font-medium text-lg text-gray-700">{{ $task->name }}</p>
                            <p class="text-gray-400 text-sm">{{ $task->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                        <p class="text-gray-600"> - {{ $task->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
