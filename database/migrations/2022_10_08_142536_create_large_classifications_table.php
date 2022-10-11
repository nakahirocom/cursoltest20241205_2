<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('large_lavels', function (Blueprint $table) {
            // large_lavelsテーブルにidを追加
            $table->id();
            // large_lavelsテーブルにlarge_lavel(大分類名)を追加
            $table->string('large_lavel');
            // タイムスタンプのカラムを追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('large_lavels');
    }
};
