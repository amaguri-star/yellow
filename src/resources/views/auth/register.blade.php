@extends('app')

@section('title', 'サインアップフォーム')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-body text-center">
                    <h2 class="card-title">サインアップ</h2>
                    <hr>
                    @include('error_card_list')
                    <div class="card-text">
                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" required>
                                <label for="name">username</label>
                            </div>

                            <div class="md-form">
                                <input type="email" id="email" name="email" class="form-control" required>
                                <label for="email">E-mail</label>
                            </div>

                            <div class="md-form">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="md-form">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required>
                                <label for="password_confirmation">Password(confirmation)</label>
                            </div>

                            <button type="submit" class="btn btn-primary">サインアップ</button>
                        </form>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('auth.login') }}" class="card-text">ログインはこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
