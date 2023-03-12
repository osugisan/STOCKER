@extends('layouts.app')

@section('title')
    {{ $box->name }}
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
            <div class="row border-bottom">
                <div class="font-weight-bold pb-3 col-7 offset-1" style="font-size: 20px">{{ $box->name }}</div>
                <img src="/storage/box_images/{{ $box->box_img }}" class="col-3 offset-1 {{ $box->box_img ?? 'd-none' }}" style="object-fit: cover;">
            </div>
            <form method="POST" action="{{ route('box.edit', $box) }}" class="mt-1" enctype="multipart/form-data">
                @csrf

                <div class="image-picker mt-3">
                    <input type="file" name="box_img" id="box_img" value="{{ old('box_img') }}" accept="image/png, image/jpeg, image/gif">
                    <label for="box_img" class="mt-3">
                        @if (!empty($box->box_img))
                            
                        @else
                            <img src="/images/noimage.png" style="object-fit: cover; width: 200px; height: 150px;">
                        @endif
                    </label>
                </div>

                <div class="form-group">
                    <label for="name">ボックス名*</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $box->name) }}" required autocomplete="name" autofocus placeholder="くすり箱">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">ボックスの説明</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5" autocomplete="on" placeholder="ボックスの説明">{{ old('description', $box->description) }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="memo">メモ</label>
                    <textarea name="memo" id="memo" class="form-control @error('memo') is-invalid @enderror" cols="30" rows="5" autocomplete="on" placeholder="メモ">{{ old('memo', $box->memo) }}</textarea>

                    @error('memo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-block btn-primary">
                        変更
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection