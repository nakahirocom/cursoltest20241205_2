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
        Schema::create('middle_classifications', function (Blueprint $table) {
            // middle_classificationsテーブルにmiddle_classification_idを追加
            $table->id('middle_classification_id');
            // middle_classificationsテーブルにlarge_classification_idを追加
            $table->unsignedBigInteger('large_classification_id');
            // middle_classificationsテーブルのlarge_classification_idカラムにlarge_classificationsテーブルのlarge_classification_idカラムを関連づける
            $table->foreign('large_classification_id')->references('large_classification_id')->on('large_classifications');
            // large_classificationsテーブルにlarge_classification(大分類名)を追加
            $table->string('middle_classification');
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
        Schema::dropIfExists('middle_classifications');
    }
};
