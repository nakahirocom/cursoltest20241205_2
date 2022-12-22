<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    /**
     * 答えが被らない問題を3つ返却する
     *
     * @return array
     */
    public static function getThreeQuestionsAtRandom(): array
    {
        $q1 = Question::inRandomOrder()->first();
        $q2 = Question::whereNot('answer', $q1?->answer)->inRandomOrder()->first();
        $q3 = Question::whereNotIn('answer', [$q1?->answer, $q2?->answer])->inRandomOrder()->first();

        return [$q1, $q2, $q3];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answerResult()
    {
        return $this->hasMany(AnswerResults::class);
    }
}
