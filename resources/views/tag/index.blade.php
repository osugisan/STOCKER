@extends('layouts.app')

@section('title')
    タグ一覧/編集
@endsection

@section('content')
    <div class="container-fluid">
        <div class="mt-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="row justify-content-center">
            <div class="card mt-3 col-10">
                <div class="card-body py-2">
                    <div class="font-weight-bold border-bottom pb-2 text-center">タグ登録</div>
                    <form method="post" action="{{ route('tag.create') }}" class="mt-3">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group row  text-align-center">
                            <label for="name" class="col-4 text-center pt-2">タグ名</label>
                            <div class="col-8">
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="キッチン">
                            </div>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <table class="table table-striped col-10">
                <thead>
                    <tr>
                        <th class="col-4">タグ番号</th>
                        <th class="col-8">タグ名</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->id }}</th>
                            <td>{{ $tag->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection