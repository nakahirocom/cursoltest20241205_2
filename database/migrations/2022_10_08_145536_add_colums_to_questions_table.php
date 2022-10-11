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
        Schema::table('questions', function (Blueprint $table) {
            // questionsテーブルにlarge_label_idを追加
            $table->unsignedBigInteger('large_label_id')->nullable()->after('comment');
            // questionsテーブルのlarge_label_idカラムにlarge_labelsテーブルのidカラムを関連づける
            $table->foreign('large_label_id')->references('id')->on('large_labels');
            // questionsテーブルにmiddle_label_idを追加
            $table->unsignedBigInteger('middle_label_id')->nullable()->after('large_label_id');
            // questionsテーブルのmiddle_label_idカラムにmiddle_labelsテーブルのidカラムを関連づける
            $table->foreign('middle_label_id')->references('id')->on('middle_labels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }
};
