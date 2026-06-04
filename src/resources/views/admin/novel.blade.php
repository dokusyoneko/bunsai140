@extends('layouts.admin_layout')

@section('css')
    <link rel="stylesheet" href="/css/admin_novel.css">
@endsection


@section('content')


    <h1 class="title">作品管理</h1>

    <div class="tab">
        <a href="/admin/novel?status=active" class="{{ $status === 'active' ? 'active' : '' }}">公開中</a>
        <a href="/admin/novel?status=deleted" class="{{ $status === 'deleted' ? 'active' : '' }}">削除済み</a>
    </div>

    <section class="works">
        @foreach ($novels as $novel)
            <article class="work__card">
                @if ($novel->draft == 1)
                    <div class="draft-label">下書き</div>
                @endif
                <p class="work__card__novel">
                    {{ $novel->body }}
                </p>
                <div class="work__card__meta">
                    <div class="work__card__meta__inner">
                        <div class="work__card__author">
                            {{ $novel->user->name }}
                        </div>
                        <div class="work__card__date">
                            {{ $novel->created_at->format('Y/m/d') }}
                        </div>
                    </div>

                    <div class="like__area">
                        <img src="{{ asset('img/favorite2.png') }}" class="like__icon">
                        <span class="like__count">{{ $novel->likes }}</span>
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
                    </div>
                </div>
            </article>
        @endforeach
    </section>

@endsection
