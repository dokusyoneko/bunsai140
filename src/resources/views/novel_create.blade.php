@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/novel_create.css') }}">
@endsection

@section('content')
<div class="main__content__inner">
    <div class="char-count">0/140</div>
    <textarea class="textarea__novel" name="" id="" placeholder="ここに物語を綴ってください、、、"></textarea>
    <div class="novel-buttons">
        <button class="novel_storage">筆を休める</button>
        <button class="novel_post">投稿する</button>
    </div>
</div>
@endsection
