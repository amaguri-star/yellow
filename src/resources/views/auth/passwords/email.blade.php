@extends('app')

@section('title', 'メールアドレス入力')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-body text-center">
                    <h2 class="card-title">メールアドレスを入力</h2>
                    <hr>
                    @include('error_card_list')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-text">
                        <form action="{{ route('password.request') }}" method="POST">
                            @csrf
                            <div class="md-form mb-4">
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">送信</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
