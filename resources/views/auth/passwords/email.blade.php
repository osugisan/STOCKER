@extends('layouts.only_content')

@section('title')
    パスワードリセット
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">パスワードリセット</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-1">
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

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-block btn-primary">
                        送信する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

