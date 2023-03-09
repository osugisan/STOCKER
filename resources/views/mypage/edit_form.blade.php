@extends('layouts.app')

@section('title')
    プロフィール編集
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="card shadow mt-4">
            <div class="card-body">
                <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">プロフィール編集</div>

                <form action="{{ route('mypage.edit') }}" method="post" enctype="multipart/form-data" class="p-1">
                    @csrf

                    {{-- アバター画像 --}}
                    <span class="image-picker">
                        <input type="file" name="avatar_img" class="d-none" accept="image/png, image/jpeg, image/gif" id="avatar_img">
                        <label for="avatar_img" class="my-3 d-flex justify-content-center">
                            @if (!empty($user->avatar_img))
                                <img src="/storage/avatars/{{ $user->avatar_img }}" class="shadow-lg rounded-circle" style="object-fit: cover; width: 150px; height: 150px;">
                            @else
                                <span><i class="fa-solid fa-circle-user fa-8x"></i></span>
                            @endif
                        </label>
                    </span>

                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection