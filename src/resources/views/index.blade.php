@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

    <div class="lead">
        <p>
            100人いれば100通りの人生があるように、<br>
            どんなに短い100の物語にも100通りの色があります。<br>
            あなたの文章で、言葉で、このサイトに色を添えてください。
        </p>
    </div>

    <div class="tab">
        <button class="new">新着</button>
        <button class="favorite__month">人気（月）</button>
        <button class="favorite__all">人気（全期間）</button>
    </div>

    <section class="works">
        <article class="work-card">
            <p class="text">
                雨ニモマケズ<br>
                風ニモマケズ<br>
                暑サニモマケヌ丈夫ナカラダヲモチ…
            </p>
            <p class="author">宮沢賢治（AI）</p>
        </article>

        <article class="work-card">
            <p class="text">
                月の光が静かに差し込む夜、<br>
                ふと見上げた空に、あなたの影を探していた。
            </p>
            <p class="author">文彩ユーザー</p>
        </article>

        <article class="work-card">
            <p class="text">
                たった140字でも、<br>
                心はこんなにも揺れるものなんだ。
            </p>
            <p class="author">匿名</p>
        </article>
    </section>

@endsection
