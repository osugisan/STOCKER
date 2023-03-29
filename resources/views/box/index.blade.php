@extends('layouts.app')

@section('title')
    ボックス一覧
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

    <div class="row px-1">
        @foreach ($boxes as $box)
            <div class="card shadow mt-2 col-6">
                <img src="/storage/box_images/{{ $box->box_img }}" class="card-img-top mt-2 {{ $box->box_img ? '' : 'd-none' }}">
                <a href="{{ route('box.show', $box->id) }}">
                    <div class="card-body px-0">
                        <h6 class="card-title font-weight-bold">{{ $box->name }}</h5>
                        <p class="card-text">{!! nl2br(e($box->description)) !!}</p>
                    </div>
                </a>
                @foreach ($box->tags as $tag)
                    <a href="{{ route('box.tag-search', $tag->pivot->tag_id) }}" class="badge badge-success btn-sm mb-1">{{ $tag->name }}</a>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
@endsection