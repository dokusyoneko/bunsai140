@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/novel_create.css') }}">
@endsection

@section('content')
<div class="main__content__inner">
    @if(isset($novel))
    <form action="{{ route('novel.update', $novel->id) }}" method="POST">
        @csrf
        @method('PUT')
    @else
    <form action="{{ route('novel.store') }}" method="POST">
        @csrf
    @endif

        <div class="char-count">
            0/140
        </div>
        <textarea class="textarea__novel" name="body" placeholder="ここに物語を綴ってください、、、" oninput="countChars()">{{ old('body', $novel->body ?? '') }}</textarea>
        @if ($errors->has('body'))
            <div class="error-message">
                {{ $errors->first('body') }}
            </div>
        @endif
        <div class="novel-buttons">
            <button type="submit" name="action" value="draft" class="novel_storage">
                筆を休める
            </button>
            <button type="submit" name="action" value="publish" class="novel_post">
                投稿する
            </button>
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
