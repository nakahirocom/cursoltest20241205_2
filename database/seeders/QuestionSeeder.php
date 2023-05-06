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
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×2=',
            'answer' => 2,
            'comment' => 'イチカケルニハニ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×3=',
            'answer' => 3,
            'comment' => 'イチカケルサンハサン',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×4=',
            'answer' => 4,
            'comment' => 'イチカケルヨンハヨン',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×5=',
            'answer' => 5,
            'comment' => 'イチカケルゴハゴ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×6=',
            'answer' => 6,
            'comment' => 'イチカケルロクハロク',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×7=',
            'answer' => 7,
            'comment' => 'イチカケルナナハナナ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×8=',
            'answer' => 8,
            'comment' => 'イチカケルハチハハチ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×9=',
            'answer' => 9,
            'comment' => 'イチカケルキュウハキュウ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×1=',
            'answer' => 2,
            'comment' => 'ニカケルイチハニ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×2=',
            'answer' => 4,
            'comment' => 'ニカケルニハヨン',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×3=',
            'answer' => 6,
            'comment' => 'ニカケルサンハロク',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×4=',
            'answer' => 8,
            'comment' => 'ニカケルヨンハハチ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×5=',
            'answer' => 10,
            'comment' => 'ニカケルゴハジュウ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×6=',
            'answer' => 12,
            'comment' => 'ニカケルロクハジュウニ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×7=',
            'answer' => 14,
            'comment' => 'ニカケルナナハジュウヨン',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×8=',
            'answer' => 16,
            'comment' => 'ニカケルハチハジュウロク',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '2×9=',
            'answer' => 18,
            'comment' => 'ニカケルキュウハジュウハチ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
    }
}
