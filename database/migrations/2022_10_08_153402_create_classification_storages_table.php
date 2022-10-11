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
        Schema::create('label_storages', function (Blueprint $table) {
            // label_storagesテーブルにidを追加
            $table->id();
            // label_storagesテーブルにuser_idを追加
            $table->unsignedBigInteger('user_id');
            // label_storagesテーブルのuser_idカラムにusersテーブルのidカラムを関連づける
            $table->foreign('user_id')->references('id')->on('users');

            // label_storagesテーブルにlarge_label_idを追加
            $table->unsignedBigInteger('large_label_id')->nullable();
            // label_storagesテーブルのlarge_label_idカラムにlarge_labelテーブルのidカラムを関連づける
            $table->foreign('large_label_id')->references('id')->on('large_labels');

            // label_storagesテーブルにmiddle_label_idを追加
            $table->unsignedBigInteger('middle_label_id')->nullable();
            // label_storagesテーブルのmiddle_label_idカラムにmiddle_labelsテーブルのidカラムを関連づける
            $table->foreign('middle_label_id')->references('id')->on('middle_labels');

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
        Schema::dropIfExists('label_storages');
    }
};
