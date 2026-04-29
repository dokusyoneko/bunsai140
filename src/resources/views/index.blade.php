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
        <a href="{{ url('/novel?tab=new') }}">
            <button class="{{ $tab === 'new' ? 'active' : '' }}">新着</button>
        </a>

        <a href="{{ url('/novel?tab=month') }}">
            <button class="{{ $tab === 'month' ? 'active' : '' }}">人気（月）</button>
        </a>

        <a href="{{ url('/novel?tab=all') }}">
            <button class="{{ $tab === 'all' ? 'active' : '' }}">人気（全期間）</button>
        </a>
    </div>

    <section class="works">
        @foreach ($novels as $novel)
            <article class="work-card">
                <p class="text">
                    {{ $novel->body }}
                </p>

                <p class="author">
                    {{ $novel->user->name }}
                    ／
                    {{ $novel->created_at->format('Y/m/d') }}
                </p>

                <div class="like-area">
                    <button type="button" class="like-button" data-novel-id="{{ $novel->id }}" data-liked="{{ $novel->isLikedBy(auth()->user()) ? '1' : '0' }}">
                        <img src="{{ $novel->isLikedBy(auth()->user()) ? asset('img/favorite_red.png') : asset('favorite1.png') }}" class="like-icon">
                    </button>
                    <span class="like-count">{{ $novel->likes }}</span>
                </div>
            </article>
        @endforeach
    </section>

@endsection
