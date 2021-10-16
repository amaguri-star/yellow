@extends('app')

@section('title', 'ログインフォーム')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-body text-center">
                    <h2 class="card-title">ログイン</h2>
                    <hr>
                    @include('error_card_list')
                    <div class="card-text">
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <div class="md-form mb-4">
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="email" required>
                            </div>

                            <div class="md-form mb-4">
                                <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                            </div>

                            <div class="text-left">
                                <a href="#" class="card-text">パスワードを忘れた方はこちらから</a>
                            </div>
                            <input type="hidden" name="remember" id="remember" value="on">
                            <button type="submit" class="btn btn-primary">ログイン</button>
                        </form>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('auth.register') }}" class="card-text">サインアップはこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
