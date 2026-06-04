@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
<div class="profile-edit">
    <h2 class="title">プロフィール編集</h2>
    <form action="{{ route('mypage.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group avatar-group">
            <div class="avatar-preview">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('img/default_icon.png') }}" class="avatar-img" alt="アイコン画像">
            </div>
            <input type="file" name="avatar" class="input-file">
            @error('avatar')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label class="label">ペンネーム</label>
            <input type="text" name="name" class="input-text" value="{{ old('name', $user->name) }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{--<div class="form-group">
            <label class="label">自己紹介</label>
            <textarea name="profile_message" class="textarea">{{ old('profile_message', $user->profile_message) }}</textarea>
            @error('profile_message')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>--}}
        <div class="button-area">
            <a href="{{ route('mypage.index') }}" class="back-button">戻る</a>
            <button type="submit" class="save-button">保存する</button>
        </div>
    </form>
</div>
@endsection
