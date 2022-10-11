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
        Schema::create('middle_lavels', function (Blueprint $table) {
            // middle_lavelsテーブルにidを追加
            $table->id();
            // middle_lavelsテーブルにlarge_lavel_idを追加
            $table->unsignedBigInteger('large_lavel_id');
            // middle_lavelsテーブルのlarge_lavel_idカラムにlarge_lavelsテーブルのidカラムを関連づける
            $table->foreign('large_lavel_id')->references('id')->on('large_lavels');
            // large_lavelsテーブルにmiddle_lavel(中分類名)を追加
            $table->string('middle_lavel');
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
        Schema::dropIfExists('middle_lavels');
    }
};
