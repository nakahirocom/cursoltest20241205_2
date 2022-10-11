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
        Schema::create('lavel_storages', function (Blueprint $table) {
            // lavel_storagesテーブルにidを追加
            $table->id();
            // lavel_storagesテーブルにuser_idを追加
            $table->unsignedBigInteger('user_id');
            // lavel_storagesテーブルのuser_idカラムにusersテーブルのidカラムを関連づける
            $table->foreign('user_id')->references('id')->on('users');

            // lavel_storagesテーブルにlarge_lavel_idを追加
            $table->unsignedBigInteger('large_lavel_id');
            // lavel_storagesテーブルのlarge_lavel_idカラムにlarge_lavelテーブルのidカラムを関連づける
            $table->foreign('large_lavel_id')->references('id')->on('large_lavels');

            // lavel_storagesテーブルにmiddle_lavel_idを追加
            $table->unsignedBigInteger('middle_lavel_id');
            // lavel_storagesテーブルのmiddle_lavel_idカラムにmiddle_lavelsテーブルのidカラムを関連づける
            $table->foreign('middle_lavel_id')->references('id')->on('middle_lavels');

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
        Schema::dropIfExists('lavel_storages');
    }
};
