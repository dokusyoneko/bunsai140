<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'novel_id',
    ];

    // ▼ リレーション設定 ▼

    // いいねは1人のユーザーに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // いいねは1つの小説に属する
    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

}
