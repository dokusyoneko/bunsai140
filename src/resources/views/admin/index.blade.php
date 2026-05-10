@extends('layouts.layout') {{-- 管理画面用レイアウトがあれば変更 --}}

@section('content')
<div class="container">
    <h1>作品管理</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>作者</th>
                <th>本文</th>
                <th>いいね</th>
                <th>状態</th>
                <th>作成日</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($novels as $novel)
                <tr>
                    <td>{{ $novel->id }}</td>
                    <td>{{ $novel->user->name }}</td>
                    <td>{{ Str::limit($novel->body, 30) }}</td>
                    <td>{{ $novel->likes }}</td>

                    <td>
                        @if ($novel->deleted_at)
                            <span style="color:red;">削除済み</span>
                        @else
                            公開中
                        @endif
                    </td>

                    <td>{{ $novel->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
