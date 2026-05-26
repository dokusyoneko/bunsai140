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
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'avatar' => null,
            'profile_message' => 'テスト用のユーザーです。',
        ]);


        User::create([
            'name' => 'A太郎',
            'email' => 'ataro@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'avatar' => null,
            'profile_message' => 'A太郎です。',
        ]);

        User::create([
            'name' => 'B子',
            'email' => 'bko@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'avatar' => null,
            'profile_message' => 'B子です。',
        ]);

        User::create([
            'name' => 'C奈',
            'email' => 'cna@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'avatar' => null,
            'profile_message' => 'C奈です。',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);
    }
}
