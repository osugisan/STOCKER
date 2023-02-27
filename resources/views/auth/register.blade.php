@extends('layouts.only_content')

@section('title')
    会員登録
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">会員登録</div>
            <form method="POST" action="{{ route('register') }}" class="p-4">
                @csrf

                <div class="form-group mt-1">
                    <label for="name">名前</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="名前">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="stocker@exemple.com">

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
                    <label for="password-confirm">パスワード確認</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="パスワードの確認">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                        会員登録
                    </button>
                </div>

                <div>
                    アカウントをお持ちの方は<a href="route('login')">こちら</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
