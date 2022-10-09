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
        Schema::create('large_classifications', function (Blueprint $table) {
            // large_classificationsテーブルにlarge_classification_idを追加
            $table->id('large_classification_id');
            // alarge_classificationsテーブルにlarge_classification(大分類名)を追加
            $table->string('large_classification');
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
        Schema::dropIfExists('large_classifications');
    }
};
