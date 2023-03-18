@extends('layouts.app')

@section('title')
    ボックス登録
@endsection

@section('content')
    <div class="container-fluid">
        <div class="mt-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="card shadow mt-4">
            <div class="card-body">
                <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">ボックス登録</div>
                <form method="POST" action="{{ route('box.create') }}" class="mt-1" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="image-picker mt-3">
                        <input type="file" name="box_img" id="box_img" value="{{ old('box_img') }}" accept="image/png, image/jpeg, image/gif">
                        <label for="box_img" class="mt-3">
                            <img src="/images/noimage.png" style="object-fit: cover; width: 200px; height: 150px;">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="name">ボックス名*</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="くすり箱">
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="description">ボックスの説明</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" cols="30" rows="5" autocomplete="on" placeholder="ボックスの説明"></textarea>
    
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="memo">メモ</label>
                        <textarea name="memo" id="memo" class="form-control @error('memo') is-invalid @enderror" value="{{ old('memo') }}" cols="30" rows="5" autocomplete="on" placeholder="メモ"></textarea>
    
                        @error('memo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <span class="mb-2 d-block">タグ</span>
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" id="{{ $tag->id }}">
                                <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
    
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-block btn-primary">
                            登録
                        </button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>
@endsection