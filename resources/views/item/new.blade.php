@extends('layouts.app')

@section('title')
    アイテム登録
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
                <div class="font-weight-bold border-bottom pb-3 text-center" style="font-size: 20px">アイテム登録</div>
                <form method="POST" action="{{ route('item.create') }}" class="mt-1" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="image-picker mt-3">
                        <input type="file" name="box_img" id="box_img" value="{{ old('box_img') }}" accept="image/png, image/jpeg, image/gif">
                        <label for="box_img" class="mt-3">
                            <img src="/images/noimage.png" style="object-fit: cover; width: 200px; height: 150px;">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="name">アイテム名*</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="アイテム名">
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="qty">在庫数*</label>
                        <input id="qty" type="number" class="col-2 form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" required autocomplete="qty" autofocus>
                        
                        @error('qty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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