<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => '宮下 奈都',
            'email' => 'miyashita@example.com',
            'password' => Hash::make('password'),
            'role' => 1, // 一般ユーザー
        ]);

        User::create([
            'name' => '彩瀬まる',
            'email' => 'ayase@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        User::create([
            'name' => 'ほしおさなえ',
            'email' => 'hoshio@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
    }
}
