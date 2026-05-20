@extends('layouts.admin_layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_news.css') }}">
@endsection


@section('content')

<h1 class="title">お知らせ管理</h1>


<div class="news-wrapper">
<section class="news-create">

    <h2 class="section-title">お知らせの作成</h2>

    <form action="{{ route('admin.news.store') }}" method="POST">
        @csrf

        <label class="form-label">タイトル</label>
        <input type="text" name="title" class="form-input"
            placeholder="例：システムメンテナンスのお知らせ">

        <div class="form__error">
            @error('title')
            {{ $message }}
            @enderror
        </div>

        <label class="form-label">本文</label>
        <textarea name="body" class="form-textarea"
            placeholder="お知らせの内容を入力してください…"></textarea>
        <div class="form__error">
            @error('body')
            {{ $message }}
            @enderror
        </div>

        <label class="form-checkbox">
            <input type="checkbox" name="is_important" value="1">
            重要なお知らせとしてマークする
        </label>

        <div class="submit-area">
            <button class="btn-submit">配信する</button>
        </div>
    </form>

</section>

<section class="news-list">

    <h2 class="section-title">投稿済みのお知らせ</h2>

    @foreach ($news as $item)
        <div class="news-item">

            <div class="news-header">
                @if ($item->important)
                    <span class="news-badge important">重要</span>
                @else
                    <span class="news-badge normal">お知らせ</span>
                @endif

                <span class="news-date">{{ $item->created_at->format('Y/m/d') }}</span>
            </div>

            <h3 class="news-item-title">{{ $item->title }}</h3>
            <p class="news-body">{!! nl2br(e($item->body)) !!}</p>

            <div class="news-actions">
                <form action="{{ route('admin.news.delete', $item->id) }}" method="POST">
                    @csrf
                    <button class="btn-delete">削除</button>
                </form>
            </div>

        </div>


    @endforeach

</section>
</div>

@endsection
