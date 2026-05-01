<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Novel;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Novel $novel)
    {
        if (!auth()->check()) {
        return response()->json(['error' => 'Unauthenticated'], 401);

        }
        $user = auth()->user();

        // すでにいいねしているか？
        $liked = $novel->likes()->where('user_id', $user->id)->exists();

        if ($liked) {
            // いいね解除
            $novel->likes()->where('user_id', $user->id)->delete();
            $novel->decrement('likes');
        } else {
            // いいね追加
            $novel->likes()->create(['user_id' => $user->id]);
            $novel->increment('likes');
        }

        return response()->json([
            'liked' => !$liked,
            'likes_count' => $novel->likes,
        ]);
    }
}
