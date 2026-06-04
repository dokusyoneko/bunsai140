@extends('layouts.admin_layout')

@section('css')
    <link rel="stylesheet" href="/css/admin_user.css">
@endsection

@section('content')

<h1 class="title">利用者管理</h1>

<div class="tab">
    <a href="/admin/user?status=active" class="{{ $status === 'active' ? 'active' : '' }}">利用中</a>
    <a href="/admin/user?status=banned" class="{{ $status === 'banned' ? 'active' : '' }}">凍結中</a>
</div>

<section class="users">
    @foreach ($users as $user)
        <article class="user__card">

            <div class="user__header">
                <img src="{{ $user->avatar ? 'storage/' .$user->avatar: asset('img/default.png') }}" class="avatar">
                <span class="user__name">{{ $user->name }}</span>
                <div class="user__count">
                    投稿作品数：{{ $user->novels->count() }}
                </div>
            </div>

            <div class="user__meta">
                <div class="user__meta__inner">
                    <div class="user__email">{{ $user->email }}</div>
                    <div class="user__date">登録日：{{ $user->created_at->format('Y/m/d') }}</div>
                </div>

                <div class="admin-actions">
                    @if ($user->is_banned)
                        <form action="{{ route('admin.user.unban', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn-restore">解除</button>
                        </form>
                    @else
                        <form action="{{ route('admin.user.ban', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn-delete">凍結</button>
                        </form>
                    @endif
                </div>
            </div>

        </article>
    @endforeach
</section>

@endsection
