<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Answer_results;

class Answer_ResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 正解率100%
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 1,
            'answered_question_id' => 1,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 2,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 3,
            'answered_question_id' => 3,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 4,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 5,
            'answered_question_id' => 5,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 6,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 7,
            'answered_question_id' => 7,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 8,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 9,
            'answered_question_id' => 9,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 10,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 11,
            'answered_question_id' => 11,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 12,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 13,
            'answered_question_id' => 13,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 14,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 15,
            'answered_question_id' => 15,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 16,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 17,
            'answered_question_id' => 17,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 18,
            'answered_question_id' => 18,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 1,
            'answered_question_id' => 1,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 2,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 3,
            'answered_question_id' => 3,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 4,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 5,
            'answered_question_id' => 5,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 6,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 7,
            'answered_question_id' => 7,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 8,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 9,
            'answered_question_id' => 9,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 10,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 11,
            'answered_question_id' => 11,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 12,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 13,
            'answered_question_id' => 13,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 14,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 15,
            'answered_question_id' => 15,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 16,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 17,
            'answered_question_id' => 17,
        ]);
        Answer_results::create([
            'user_id' => 1,
            'question_id' => 18,
            'answered_question_id' => 18,
        ]);
        // user_id 2 正解率75%
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 1,
            'answered_question_id' => 1,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 2,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 3,
            'answered_question_id' => 3,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 4,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 5,
            'answered_question_id' => 5,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 6,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 7,
            'answered_question_id' => 7,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 8,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 9,
            'answered_question_id' => 9,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 10,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 11,
            'answered_question_id' => 11,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 12,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 13,
            'answered_question_id' => 13,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 14,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 15,
            'answered_question_id' => 15,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 16,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 17,
            'answered_question_id' => 17,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 18,
            'answered_question_id' => 18,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 1,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 2,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 3,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 4,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 5,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 6,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 7,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 8,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 9,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 10,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 11,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 12,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 13,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 14,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 15,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 16,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 17,
            'answered_question_id' => 18,
        ]);
        Answer_results::create([
            'user_id' => 2,
            'question_id' => 18,
            'answered_question_id' => 18,
        ]);
        // user_id 3 正解率50%
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 1,
            'answered_question_id' => 1,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 2,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 3,
            'answered_question_id' => 3,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 4,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 5,
            'answered_question_id' => 5,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 6,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 7,
            'answered_question_id' => 7,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 8,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 9,
            'answered_question_id' => 9,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 10,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 11,
            'answered_question_id' => 11,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 12,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 13,
            'answered_question_id' => 13,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 14,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 15,
            'answered_question_id' => 15,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 16,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 17,
            'answered_question_id' => 17,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 18,
            'answered_question_id' => 18,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 1,
            'answered_question_id' => 18,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 2,
            'answered_question_id' => 17,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 3,
            'answered_question_id' => 16,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 4,
            'answered_question_id' => 15,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 5,
            'answered_question_id' => 14,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 6,
            'answered_question_id' => 13,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 7,
            'answered_question_id' => 12,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 8,
            'answered_question_id' => 11,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 9,
            'answered_question_id' => 10,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 10,
            'answered_question_id' => 9,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 11,
            'answered_question_id' => 8,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 12,
            'answered_question_id' => 7,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 13,
            'answered_question_id' => 6,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 14,
            'answered_question_id' => 5,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 15,
            'answered_question_id' => 4,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 16,
            'answered_question_id' => 3,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 17,
            'answered_question_id' => 2,
        ]);
        Answer_results::create([
            'user_id' => 3,
            'question_id' => 18,
            'answered_question_id' => 1,
        ]);
    }
}
