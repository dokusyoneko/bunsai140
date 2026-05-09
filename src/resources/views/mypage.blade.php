@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">

    {{-- プロフィール --}}
    <div class="profile">
        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('img/default_icon.png') }}" class="profile__avatar" alt="プロフィール画像">

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
        <button class="tab__button active" data-target="works">作品</button>
        <button class="tab__button" data-target="favorites">お気に入り</button>
        <button class="tab__button" data-target="drafts">下書き</button>
    </div>

    {{-- 作品一覧（公開作品） --}}
    <div class="tab__content" id="works">
        @foreach ($novels as $novel)
            <article class="work-card">
                <p class="text">{!! nl2br(e($novel->body)) !!}</p>

                <div class="work-card__footer">
                    <div class="author">
                        {{ $novel->user->name }}
                    </div>

                    <div class="meta">
                        <span class="date">{{ $novel->created_at->format('Y/m/d') }}</span>

                        <div class="like__area">
                            <button type="button" class="like__button"
                            data-novel-id="{{ $novel->id }}"
                            data-liked="{{ $novel->isLikedBy(auth()->user()) ? '1' : '0' }}">
                        <img src="{{ $novel->isLikedBy(auth()->user()) ? asset('favorite2.png') : asset('favorite1.png') }}"class="like__icon">
                            </button>
                        <span class="like__count">{{ $novel->likes }}</span>
                        </div>
                        <form action="{{ route('novels.destroy', $novel->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">削除</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    {{-- お気に入り一覧 --}}
    <div class="tab__content" id="favorites" style="display:none;">
        @foreach ($favorites as $fav)
            <article class="work-card">
                <p class="text">{!! nl2br(e($fav->novel->body)) !!}</p>

                <div class="work-card__footer">
                    <div class="author">
                        {{ $fav->novel->user->name }}
                    </div>

                    <div class="meta">
                        <span class="date">{{ $fav->novel->created_at->format('Y/m/d') }}</span>

                        <div class="like__area">
                            <button type="button" class="like__button"
                            data-novel-id="{{ $fav->novel->id }}"
                            data-liked="{{ $fav->novel->isLikedBy(auth()->user()) ? '1' : '0' }}">
                        <img src="{{ $fav->novel->isLikedBy(auth()->user()) ? asset('favorite2.png') : asset('favorite1.png') }}" class="like__icon">
                            </button>
                        <span class="like__count">{{ $fav->novel->likes }}</span>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    {{-- 下書き一覧 --}}
    <div class="tab__content" id="drafts" style="display:none;">
        @foreach ($drafts as $draft)
            <article class="work-card">
                <p class="text">{!! nl2br(e($draft->body)) !!}</p>

                <div class="work-card__footer">
                    <div class="author">
                        {{ $user->name }}
                    </div>

                    <div class="meta">
                        <span class="date">{{ $draft->created_at->format('Y/m/d') }}</span>
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
    </div>

</div>

{{-- タブ切り替えスクリプト --}}
<script>
document.querySelectorAll('.tab__button').forEach(btn => {
    btn.addEventListener('click', () => {

        document.querySelectorAll('.tab__button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const target = btn.dataset.target;

        document.querySelectorAll('.tab__content').forEach(c => c.style.display = 'none');
        document.getElementById(target).style.display = 'block';
    });
});
</script>

@endsection
