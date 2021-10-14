@extends('app')

@section('title', 'サインアップフォーム')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-body text-center">
                    <h2 class="card-title">サインアップ</h2>
                    <hr>
                    <div class="card-text">
                        <form action="" method="POST">
                            <div class="md-form">
                                <input type="text" id="username" class="form-control" required>
                                <label for="username">username</label>
                            </div>

                            <div class="md-form">
                                <input type="email" id="email" class="form-control" required>
                                <label for="email">E-mail</label>
                            </div>

                            <div class="md-form">
                                <input type="password" id="password" class="form-control">
                                <label for="password">Password</label>
                            </div>

                            <div class="md-form">
                                <input type="password" id="password_confirmation" class="form-control" required>
                                <label for="password_confirmation">Password(confirmation)</label>
                            </div>

                        </form>
                    </div>
                    <button type="button" class="btn btn-primary">サインアップ</button>
                    <div class="mt-2">
                        <a href="{{ route('auth.login') }}" class="card-text">ログインはこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
