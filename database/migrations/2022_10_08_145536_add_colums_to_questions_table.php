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
            // questionsテーブルにlarge_classification_idを追加
            $table->unsignedBigInteger('large_classification_id')->after('comment');
            // questionsテーブルのlarge_classification_idカラムにlarge_classificationsテーブルのlarge_classification_idカラムを関連づける
            $table->foreign('large_classification_id')->references('large_classification_id')->on('large_classifications');
            // questionsテーブルにmiddle_classification_idを追加

            $table->unsignedBigInteger('middle_classification_id')->after('large_classification_id');
            // questionsテーブルのmiddle_classification_idカラムにmiddle_classificationsテーブルのmiddle_classification_idカラムを関連づける
            $table->foreign('middle_classification_id')->references('middle_classification_id')->on('middle_classifications');
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

        });
    }
};
