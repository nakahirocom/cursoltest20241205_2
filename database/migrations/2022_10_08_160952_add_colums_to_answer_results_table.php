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
        Schema::table('answer_results', function (Blueprint $table) {
            // answer_resultsテーブルにlarge_lavel_idを追加
            $table->unsignedBigInteger('large_lavel_id')->after('answered_question_id');
            // answer_resultsテーブルのlarge_lavel_idカラムにlarge_lavelsテーブルのidカラムを関連づける
            $table->foreign('large_lavel_id')->references('id')->on('large_lavels');

            // answer_resultsテーブルにmiddle_lavel_idを追加
            $table->unsignedBigInteger('middle_lavel_id')->after('large_lavel_id');
            // answer_resultsテーブルのmiddle_lavel_idカラムにmiddle_lavelsテーブルのidカラムを関連づける
            $table->foreign('middle_lavel_id')->references('id')->on('middle_lavels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_results', function (Blueprint $table) {
            //
        });
    }
};
