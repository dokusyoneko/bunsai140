<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\News::create([
            'title' => '『文彩』へようこそ',
            'body'  => "140字小説投稿サイト『文彩』へようこそ。\n皆様の素敵な言葉に出会えることを楽しみにしております。",
            'important' => true,
        ]);

        \App\Models\News::create([
            'title' => '機能追加のお知らせ',
            'body'  => '新しい機能を追加しました。',
            'important' => false,
        ]);
    }

}
