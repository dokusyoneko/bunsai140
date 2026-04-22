@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">

    {{-- プロフィール --}}
    <div class="profile">
        <img src="" class="logo" alt="ヘッダーロゴ画像">
        <div class="profile__name">
            {{ $user->name }}
        </div>
        <div class="profire__message">
            {{ $user->profile_message ?? 'まだ自己紹介がありません' }}
        </div>
        <button class="profile__edit__button">プロフィール編集</button>
    </div>

    {{-- タブ --}}
    <div class="tab">
        <button class="novel__tab">作品</button>
        <button class="favorite__tab">お気に入り</button>
        <button class="storage__tab">下書き</button>
    </div>

    {{-- 作品一覧 --}}
    <div class="novel__list">
        @foreach ($novels as $novel)
            <article class="work-card">
                <p class="text">
                    {!! nl2br(e($novel->body)) !!}
                </p>
                <p class="author">{{ $novel->user->name }}</p>
            </article>
        @endforeach
    </div>



    {{-- お気に入り一覧 --}}
    <div class="favorite__list" id="favorite-tab" style="display:none;">
        @foreach ($favorites as $fav)
            <article class="work-card">
                <p class="text">{!! nl2br(e($fav->novel->body)) !!}</p>
                <p class="author">{{ $fav->novel->user->name }}</p>
            </article>
        @endforeach
    </div>

    {{-- 下書き一覧 --}}
    <div class="storage__list" id="storage-tab" style="display:none;">
        @foreach ($drafts as $draft)
            <article class="work-card">
                <p class="text">{!! nl2br(e($draft->body)) !!}</p>
                <p class="author">{{ $user->name }}</p>
            </article>
        @endforeach
    </div>

</div>
@endsection
