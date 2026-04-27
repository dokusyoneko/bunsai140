@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/novel_create.css') }}">
@endsection

@section('content')
<div class="main__content__inner">
    <form action="{{ route('novel.store') }}" method="POST">
        @csrf
        <div class="char-count">0/140</div>
        <textarea class="textarea__novel" name="body" maxlength="140" placeholder="ここに物語を綴ってください、、、" oninput="countChars()">{{ old('body') }}</textarea>
        <div class="novel-buttons">
        <button type="submit" name="action" value="draft" class="novel_storage">筆を休める</button>
        <button type="submit" name="action" value="publish" class="novel_post">投稿する</button>
        </div>
    </form>
</div>

<script>
function countChars() {
    const text = document.querySelector('.textarea__novel').value;
    document.querySelector('.char-count').textContent = text.length + "/140";
}
countChars();
</script>

@endsection
