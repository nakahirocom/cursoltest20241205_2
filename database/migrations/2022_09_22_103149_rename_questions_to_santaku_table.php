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
        // リネーム処理で、questionsテーブルをsantakuテーブルに名称変更する
        Schema::rename('questions','santaku');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('santaku', function (Blueprint $table) {
            //
        });
    }
};
