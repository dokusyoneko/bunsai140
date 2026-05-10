<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelsTable extends Migration
{
    public function up()
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('body'); // 140字の本文
            $table->unsignedInteger('likes')->default(0); // いいね数
            $table->boolean('draft')->default(0);
            $table->softDeletes(); // ★ これを追加
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('novels');
    }
}

