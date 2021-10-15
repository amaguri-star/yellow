@extends('app')

@section('title', 'ログインフォーム')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-body text-center">
                    <h2 class="card-title">ログイン</h2>
                    <hr>
                    <div class="card-text">
                        <form action="" method="POST">
                            <div class="md-form">
                                <input type="email" id="email" name="email" class="form-control">
                                <label for="email">E-mail</label>
                            </div>

                            <div class="md-form">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="password">Password</label>
                            </div>

                            <div class="text-left">
                                <a href="#" class="card-text">パスワードを忘れた方はこちらから</a>
                            </div>
                        </form>
                    </div>
                    <button type="button" class="btn btn-primary">ログイン</button>
                    <div class="mt-2">
                        <a href="{{ route('auth.register') }}" class="card-text">サインアップはこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
