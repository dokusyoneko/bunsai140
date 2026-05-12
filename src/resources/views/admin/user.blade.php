@extends('layouts.admin_layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_user.css') }}">
@endsection

@section('content')
<div class="container">

    <h1>利用者管理</h1>

    <div class="tabs">
        <a href="/admin/user?status=active" class="{{ $status === 'active' ? 'active' : '' }}">利用中</a>
        <a href="/admin/user?status=banned" class="{{ $status === 'banned' ? 'active' : '' }}">停止中</a>
    </div>

    @foreach ($users as $user)
        <div class="novel-card">

            <div class="novel-header">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : '/img/default.png' }}" class="avatar">
                <div class="author-info">
                    <span class="name">{{ $user->name }}</span>
                    <span class="handle">@user{{ $user->id }}</span>
                </div>
            </div>

            <div class="novel-body">
                登録日：{{ $user->created_at->format('Y/m/d') }}
            </div>

            <div class="admin-actions">
                @if ($user->is_banned)
                    <form action="{{ route('admin.user.unban', $user->id) }}" method="POST">
                        @csrf
                        <button class="btn-restore">利用再開</button>
                    </form>
                @else
                    <form action="{{ route('admin.user.ban', $user->id) }}" method="POST">
                        @csrf
                        <button class="btn-delete">利用停止</button>
                    </form>
                @endif
            </div>

        </div>
    @endforeach

</div>
@endsection
