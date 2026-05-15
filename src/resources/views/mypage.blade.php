@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    {{-- プロフィール --}}
    <div class="profile">
        <img src="{{ $user->avatar ? asset('storage/' .$user->avatar) : asset('img/default.png') }}" class="avatar" alt="プロフィール画像">
        <div class="profile__name">{{ $user->name }}</div>
        <div class="profile__message">
            {{ $user->profile_message ?? 'まだ自己紹介がありません' }}
        </div>
        <a href="{{ route('mypage.edit') }}" class="profile__edit__button">
            プロフィール編集
        </a>
    </div>

    {{-- タブ --}}
    <div class="tab">
        <a href="{{ url('/mypage?tab=works') }}">
            <button class="{{ $tab === 'works' ? 'active' : '' }}">作品</button>
        </a>
        <a href="{{ url('/mypage?tab=favorites') }}">
            <button class="{{ $tab === 'favorites' ? 'active' : '' }}">お気に入り</button>
        </a>
        <a href="{{ url('/mypage?tab=drafts') }}">
            <button class="{{ $tab === 'drafts' ? 'active' : '' }}">下書き</button>
        </a>
    </div>

    {{-- 作品一覧 --}}
    @if ($tab === 'works')
        @foreach ($novels as $novel)
            <article class="work__card">
                <p class="work__card__novel">{!! nl2br(e($novel->body)) !!}</p>
                <div class="work__card__meta">
                    <div class="work__card__meta__inner">
                        <div class="work__card__author">{{ $novel->user->name }}</div>
                        <div class="work__card__date">{{ $novel->created_at->format('Y/m/d') }}</div>
                    </div>

                    <div class="like__area">
                        <button type="button" class="like__button"
                            data-novel-id="{{ $novel->id }}"
                            data-liked="{{ $novel->isLikedBy(auth()->user()) ? '1' : '0' }}">
                            <img src="{{ $novel->isLikedBy(auth()->user()) ? asset('img/favorite2.png') : asset('img/favorite1.png') }}" class="like__icon">
                        </button>
                        <span class="like__count">{{ $novel->likes }}</span>
                        @if ($novel->user_id === auth()->id())
                        <form action="{{ route('novels.destroy', $novel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button">削除</button>
                        </form>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach

    @endif

    {{-- お気に入り --}}
    @if ($tab === 'favorites')
        @foreach ($favorites as $fav)
            <article class="work__card">
                <p class="work__card__novel">{!! nl2br(e($fav->novel->body)) !!}</p>

                <div class="work__card__meta">
                    <div class="work__card__meta__inner">
                        <div class="work__card__author">{{ $fav->novel->user->name }}</div>
                        <div class="work__card__date">{{ $fav->novel->created_at->format('Y/m/d') }}</div>
                    </div>

                    <div class="like__area">
                        <button type="button" class="like__button"
                            data-novel-id="{{ $fav->novel->id }}"
                            data-liked="{{ $fav->novel->isLikedBy(auth()->user()) ? '1' : '0' }}">
                            <img src="{{ $fav->novel->isLikedBy(auth()->user()) ? asset('img/favorite2.png') : asset('img/favorite1.png') }}"class="like__icon">
                        </button>
                        <span class="like__count">{{ $fav->novel->likes }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    @endif

    {{-- 下書き --}}
    @if ($tab === 'drafts')
        @foreach ($drafts as $draft)
            <article class="work__card">
                <p class="work__card__novel">{!! nl2br(e($draft->body)) !!}</p>

                <div class="work__card__meta">
                    <div class="work__card__meta__inner">
                        <div class="work__card__author">{{ $user->name }}</div>
                        <div class="work__card__date">{{ $draft->created_at->format('Y/m/d') }}</div>
                    </div>

                    <div class="work__card__actions">
                        <a href="{{ route('novel.create', ['edit' => $draft->id]) }}" class="edit-button">編集</a>

                        <form action="{{ route('novels.destroy', $draft->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">削除</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    @endif
@endsection

