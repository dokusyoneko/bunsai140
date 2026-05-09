<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'profile_message',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ▼ 文彩のリレーション設定 ▼

    // 1ユーザーは複数の小説を持つ
    public function novels()
    {
        return $this->hasMany(Novel::class);
    }

    // 1ユーザーは複数の小説にいいねできる
    public function likes()
    {
        return $this->hasMany(\App\Models\Like::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Novel::class, 'likes');
    }

}
