<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
        'likes',
        'draft',
    ];

    // ▼ 文彩のリレーション設定 ▼

    // 小説は1人のユーザーに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 小説は複数のユーザーに「いいね」される
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    // Like モデルとのリレーション（Ajax で使う）
    public function likes()
    {
        return $this->hasMany(\App\Models\Like::class);
    }

    // ログインユーザーがこの小説を「いいね」しているか判定
    public function isLikedBy($user)
    {
        if (!$user) {
            return false;
        }

        return $this->likes()->where('user_id', $user->id)->exists();
    }

}
