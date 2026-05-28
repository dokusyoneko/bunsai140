@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<div class="news-wrapper">
    <h2 class="news-title">お知らせ</h2>
    <p class="news-subtitle">運営からのお便り</p>
    @foreach ($news as $item)
        <div class="news-item">
            <div class="news-header">
                @if ($item->important)
                    <span class="news-badge important">重要</span>
                @else
                    <span class="news-badge normal">お知らせ</span>
                @endif
                <span class="news-date">{{ optional($item->published_at)->format('Y/m/d') }}</span>
            </div>
            <h3 class="news-item-title">{{ $item->title }}</h3>
            <p class="news-body">{!! nl2br(e($item->body)) !!}</p>
        </div>
    @endforeach
</div>
@endsection
