@extends('app')

@section('title', 'パスワード再設定')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-body text-center">
                    <h2 class="card-title">パスワード再設定</h2>
                    <hr>
                    @include('error_card_list')
                    <div class="card-text">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" id="token" value="{{ $token }}">
                            <input type="hidden" name="email" id="email" value="{{ $email }}">
                            <div class="md-form mb-4">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="password" required>
                            </div>
                            <div class="md-form mb-4">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
