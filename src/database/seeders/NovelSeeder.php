<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Novel;
use App\Models\User;

class NovelSeeder extends Seeder
{
    public function run()
    {

        Novel::create([
            'user_id' => User::where('name', 'テストユーザー')->first()->id,
            'body' => '太陽のように温かい手で、叩かれた頬を撫でられる。ごめんね、ごめんね。潤んだ声が耳に触れる。僕は瞳を閉じたまま、大丈夫だよ、痛くないよ、と心の中でごちる。やがて頬を撫でていた手は止まり、寝息が聞こえてくる。目を開けると、月明かりに照らされたママの顔が輝いている。とても綺麗に。',
            'likes' => 0,
            'draft' => 1,
        ]);

        Novel::create([
            'user_id' => User::where('name', 'A太郎')->first()->id,
            'body' => '砂浜を撫でる波の音が遠ざかってゆく。夜の海には近づくな。それが親父の口癖だった。職業柄、海の怖さをよく知っていたのだろう。黒にも似た深い青の世界。海面に広がる夜空が揺れている。なあ、親父。お袋にはもう会えたのか。海人。自分と同じ名の漁船に乗り、月の道を進んでゆく。ただ真っすぐに。',
            'likes' => 0,
            'draft' => 0,
        ]);

        Novel::create([
            'user_id' => User::where('name', 'B子')->first()->id,
            'body' => 'パチン、パチン。祖父の爪を切る。意識を失ってから、一段と細くなった気がする。パチン、パチン。祖父は深爪だった。私は臆病なんだ。そう呟きながら爪を切っていたことを覚えている。パチン、パチン。病室の扉が開き祖母が顔を出す。今日もありがとう。そう言って、頬に伸びた傷跡を撫でる。パチン。',
            'likes' => 0,
            'draft' => 0,
        ]);

    }
}
