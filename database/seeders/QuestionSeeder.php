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
            'answer' => '1  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルイチハイチ',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×2=',
            'answer' => '2  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルニハニ',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×3=',
            'answer' => '3  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルサンハサン',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×4=',
            'answer' => '4  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルヨンハヨン',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×5=',
            'answer' => '5  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルゴハゴ',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×6=',
            'answer' => '6  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルロクハロク',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×7=',
            'answer' => '7  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルナナハナナ',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×8=',
            'answer' => '8  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルハチハハチ',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×9=',
            'answer' => '9  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルキュウハキュウ',
            'large_label_id' => 1,
            'middle_label_id' => 3,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+1=',
            'answer' => '2  ：足し算ジャンルのanswer',
            'comment' => 'イチタスイチハニ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+2=',
            'answer' => '3  ：足し算ジャンルのanswer',
            'comment' => 'イチタスニハサン',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+3=',
            'answer' => '4  ：足し算ジャンルのanswer',
            'comment' => 'イチタスサンハヨン',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+4=',
            'answer' => '5  ：足し算ジャンルのanswer',
            'comment' => 'イチタスヨンハゴ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+5=',
            'answer' => '6  ：足し算ジャンルのanswer',
            'comment' => 'イチタスゴハロク',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+6=',
            'answer' => '7  ：足し算ジャンルのanswer',
            'comment' => 'イチタスロクハナナ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+7=',
            'answer' => '8  ：足し算ジャンルのanswer',
            'comment' => 'イチタスナナハハチ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+8=',
            'answer' => '9  ：足し算ジャンルのanswer',
            'comment' => 'イチタスハチハキュウ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+9=',
            'answer' => '10 ：足し算ジャンルのanswer',
            'comment' => 'イチタスキュウハジュウ',
            'large_label_id' => 1,
            'middle_label_id' => 1,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1-1=',
            'answer' => '0  ：引き算ジャンルのanswer',
            'comment' => 'イチヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '2-1=',
            'answer' => '1  ：引き算ジャンルのanswer',
            'comment' => 'ニヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '3-1=',
            'answer' => '2  ：引き算ジャンルのanswer',
            'comment' => 'サンヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '4-1=',
            'answer' => '3  ：引き算ジャンルのanswer',
            'comment' => 'ヨンヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '5-1=',
            'answer' => '4  ：引き算ジャンルのanswer',
            'comment' => 'ゴヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '6-1=',
            'answer' => '5  ：引き算ジャンルのanswer',
            'comment' => 'ロクヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '7-1=',
            'answer' => '6  ：引き算ジャンルのanswer',
            'comment' => 'ナナヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '8-1=',
            'answer' => '7  ：引き算ジャンルのanswer',
            'comment' => 'ハチヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '9-1=',
            'answer' => '8  ：引き算ジャンルのanswer',
            'comment' => 'キュウウヒクイチハ',
            'large_label_id' => 1,
            'middle_label_id' => 2,
        ]);
    }
}
