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
            // questionsテーブルにlarge_lavel_idを追加
            $table->unsignedBigInteger('large_lavel_id')->after('comment');
            // questionsテーブルのlarge_lavel_idカラムにlarge_lavelsテーブルのidカラムを関連づける
            $table->foreign('large_lavel_id')->references('id')->on('large_lavels');
            // questionsテーブルにmiddle_lavel_idを追加
            $table->unsignedBigInteger('middle_lavel_id')->after('large_lavel_id');
            // questionsテーブルのmiddle_lavel_idカラムにmiddle_lavelsテーブルのidカラムを関連づける
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
        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }
};
