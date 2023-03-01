@extends('layouts.only_content')

@section('title')
    ログイン
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">ログイン</div>
            <form method="POST" action="{{ route('login') }}" class="mt-1">
                @csrf

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="stocker@example.com">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            ログイン状態を保存する
                        </label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-block btn-primary">
                        ログイン
                    </button>
                </div>

                <div class="mt-3">
                    アカウントをお持ちでない方は<a href="{{ route('register') }}">こちら</a>
                </div>

                <div class="mt-3">
                    パスワードを忘れた方は<a href="{{ route('password.request') }}">こちら</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
