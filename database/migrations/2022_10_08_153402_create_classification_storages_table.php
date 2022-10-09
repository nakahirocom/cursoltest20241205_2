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
        Schema::create('classification_storages', function (Blueprint $table) {
            // classification_storagesテーブルにclassification_storage_idを追加
            $table->id('classification_storage_id');
            // classification_storagesテーブルにuser_idを追加
            $table->unsignedBigInteger('user_id');
            // classification_storagesテーブルのuser_idカラムにusersテーブルのuser_idカラムを関連づける
            $table->foreign('user_id')->references('user_id')->on('users');
            // large_classificationsテーブルにlarge_classification(大分類名)を追加

            // classification_storagesテーブルにlarge_classification_idを追加
           $table->unsignedBigInteger('large_classification_id');
           // classification_storagesテーブルのlarge_classification_idカラムにlarge_classificationsテーブルのlarge_classification_idカラムを関連づける
           $table->foreign('large_classification_id')->references('large_classification_id')->on('large_classifications');

           // classification_storagesテーブルにmiddle_classification_idを追加
           $table->unsignedBigInteger('middle_classification_id');
           // classification_storagesテーブルのmiddle_classification_idカラムにmiddle_classificationsテーブルのmiddle_classification_idカラムを関連づける
           $table->foreign('middle_classification_id')->references('middle_classification_id')->on('middle_classifications');

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
        Schema::dropIfExists('classification_storages');
    }
};
