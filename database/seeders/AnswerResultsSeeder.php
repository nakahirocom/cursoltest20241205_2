<?php

namespace Database\Seeders;

use App\Models\AnswerResults;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnswerResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowWithMilliseconds = Carbon::now()->format('Y-m-d H:i:s.u');
dump($nowWithMilliseconds);

        AnswerResults::create([
            'question_id' => 1,
            'user_id' => 1,
            'answered_question_id' => 1,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 2,
            'user_id' => 2,
            'answered_question_id' => 2,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 3,
            'user_id' => 3,
            'answered_question_id' => 3,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 4,
            'user_id' => 1,
            'answered_question_id' => 3,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 5,
            'user_id' => 1,
            'answered_question_id' => 3,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 6,
            'user_id' => 1,
            'answered_question_id' => 6,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 7,
            'user_id' => 1,
            'answered_question_id' => 7,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 8,
            'user_id' => 1,
            'answered_question_id' => 8,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 9,
            'user_id' => 1,
            'answered_question_id' => 9,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 10,
            'user_id' => 1,
            'answered_question_id' => 9,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 11,
            'user_id' => 1,
            'answered_question_id' => 12,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 12,
            'user_id' => 1,
            'answered_question_id' => 11,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 13,
            'user_id' => 1,
            'answered_question_id' => 11,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 14,
            'user_id' => 1,
            'answered_question_id' => 11,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 15,
            'user_id' => 1,
            'answered_question_id' => 11,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 16,
            'user_id' => 1,
            'answered_question_id' => 16,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 17,
            'user_id' => 1,
            'answered_question_id' => 17,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 18,
            'user_id' => 1,
            'answered_question_id' => 17,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 19,
            'user_id' => 1,
            'answered_question_id' => 17,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 20,
            'user_id' => 1,
            'answered_question_id' => 17,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 21,
            'user_id' => 1,
            'answered_question_id' => 21,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 22,
            'user_id' => 1,
            'answered_question_id' => 22,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 23,
            'user_id' => 1,
            'answered_question_id' => 23,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 24,
            'user_id' => 1,
            'answered_question_id' => 24,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 25,
            'user_id' => 1,
            'answered_question_id' => 24,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 26,
            'user_id' => 1,
            'answered_question_id' => 26,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 27,
            'user_id' => 1,
            'answered_question_id' => 27,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 28,
            'user_id' => 1,
            'answered_question_id' => 28,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 29,
            'user_id' => 1,
            'answered_question_id' => 29,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 30,
            'user_id' => 1,
            'answered_question_id' => 30,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 31,
            'user_id' => 1,
            'answered_question_id' => 31,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 32,
            'user_id' => 1,
            'answered_question_id' => 32,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 33,
            'user_id' => 1,
            'answered_question_id' => 32,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 34,
            'user_id' => 1,
            'answered_question_id' => 32,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 35,
            'user_id' => 1,
            'answered_question_id' => 32,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 36,
            'user_id' => 1,
            'answered_question_id' => 36,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 37,
            'user_id' => 1,
            'answered_question_id' => 37,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 38,
            'user_id' => 1,
            'answered_question_id' => 38,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 39,
            'user_id' => 1,
            'answered_question_id' => 38,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 40,
            'user_id' => 1,
            'answered_question_id' => 38,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 41,
            'user_id' => 1,
            'answered_question_id' => 41,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 42,
            'user_id' => 1,
            'answered_question_id' => 42,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 43,
            'user_id' => 1,
            'answered_question_id' => 43,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 44,
            'user_id' => 1,
            'answered_question_id' => 43,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 45,
            'user_id' => 1,
            'answered_question_id' => 43,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 46,
            'user_id' => 3,
            'answered_question_id' => 46,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 47,
            'user_id' => 3,
            'answered_question_id' => 47,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 48,
            'user_id' => 3,
            'answered_question_id' => 48,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 49,
            'user_id' => 3,
            'answered_question_id' => 49,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 50,
            'user_id' => 3,
            'answered_question_id' => 49,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 51,
            'user_id' => 3,
            'start_solving_time' => $nowWithMilliseconds,
            'answered_question_id' => 51,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 52,
            'user_id' => 3,
            'answered_question_id' => 51,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 53,
            'user_id' => 2,
            'answered_question_id' => 56,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 54,
            'user_id' => 2,
            'answered_question_id' => 56,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 55,
            'user_id' => 2,
            'answered_question_id' => 56,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 56,
            'user_id' => 2,
            'answered_question_id' => 57,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 57,
            'user_id' => 2,
            'answered_question_id' => 57,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 58,
            'user_id' => 3,
            'answered_question_id' => 57,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 59,
            'user_id' => 3,
            'answered_question_id' => 57,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        AnswerResults::create([
            'question_id' => 60,
            'user_id' => 3,
            'answered_question_id' => 57,
            'start_solving_time' => $nowWithMilliseconds,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
