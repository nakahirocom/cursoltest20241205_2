<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::create([
            'user_id' => 1,
            'question' => '1×1=',
            'answer' => 1,
            'comment' => 'イチカケルイチハイチ',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×2=',
            'answer' => 2,
            'comment' => 'イチカケルニハニ',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×3=',
            'answer' => 3,
            'comment' => 'イチカケルサンハサン',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×4=',
            'answer' => 4,
            'comment' => 'イチカケルヨンハヨン',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×5=',
            'answer' => 5,
            'comment' => 'イチカケルゴハゴ',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×6=',
            'answer' => 6,
            'comment' => 'イチカケルロクハロク',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×7=',
            'answer' => 7,
            'comment' => 'イチカケルナナハナナ',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×8=',
            'answer' => 8,
            'comment' => 'イチカケルハチハハチ',
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×9=',
            'answer' => 9,
            'comment' => 'イチカケルキュウハキュウ',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×1=',
            'answer' => 2,
            'comment' => 'ニカケルイチハニ',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×2=',
            'answer' => 4,
            'comment' => 'ニカケルニハヨン',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×3=',
            'answer' => 6,
            'comment' => 'ニカケルサンハロク',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×4=',
            'answer' => 8,
            'comment' => 'ニカケルヨンハハチ',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×5=',
            'answer' => 10,
            'comment' => 'ニカケルゴハジュウ',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×6=',
            'answer' => 12,
            'comment' => 'ニカケルロクハジュウニ',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×7=',
            'answer' => 14,
            'comment' => 'ニカケルナナハジュウヨン',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×8=',
            'answer' => 16,
            'comment' => 'ニカケルハチハジュウロク',
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×9=',
            'answer' => 18,
            'comment' => 'ニカケルキュウハジュウハチ',
        ]);
    }
}
