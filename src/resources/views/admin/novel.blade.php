@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="container">

    <h1>作品管理</h1>

    @foreach ($novels as $novel)
        <div class="novel-card">

            <div class="novel-header">
                <img src="{{ $novel->user->avatar ? asset('storage/' . $novel->user->avatar) : '/img/default.png' }}" class="avatar">
                <div class="author-info">
                    <span class="name">{{ $novel->user->name }}</span>
                    <span class="handle">@user{{ $novel->user->id }}</span>
                </div>
            </div>

            <div class="novel-body">
                {{ $novel->body }}
            </div>

            <div class="novel-footer">
                <span class="date">{{ $novel->created_at->format('Y/m/d') }}</span>
                <span class="likes">♥ {{ $novel->likes }}</span>
            </div>

            <div class="admin-actions">
                @if ($novel->deleted_at)
                    <form action="{{ route('admin.novel.restore', $novel->id) }}" method="POST">
                        @csrf
                        <button class="btn-restore">復元</button>
                    </form>
                @else
                    <form action="{{ route('admin.novel.delete', $novel->id) }}" method="POST">
                        @csrf
                        <button class="btn-delete">削除</button>
                    </form>
                @endif
            </div>

        </div>
    @endforeach

</div>
@endsection
