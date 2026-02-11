@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="profile">
        <img src="" class="logo" alt="ヘッダーロゴ画像">
        <div class="profile__name">ここに名前が入る</div>
        <div class="profire__message">ここに一言や自己紹介が入る</div>
        <button class="profile__edit__button">プロフィール編集</button>
    </div>
    <div class="tab">
        <button class="novel__tab">作品</button>
        <button class="favorite__tab">お気に入り</button>
        <button class="storage__tab">下書き</button>
    </div>
    <div class="novel__list">
        <article class="work-card">
            <p class="text">
                雨ニモマケズ<br>
                風ニモマケズ<br>
                暑サニモマケヌ丈夫ナカラダヲモチ…
            </p>
            <p class="author">宮沢賢治（AI）</p>
        </article>
    </div>
    
@endsection
