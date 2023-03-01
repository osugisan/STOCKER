@extends('layouts.only_content')

@section('title')
    パスワードリセット
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">パスワードリセット</div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="stocker@exemple.com">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワード">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">パスワードの確認</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="パスワードの確認">
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-block btn-primary">
                        パスワードを再設定する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

