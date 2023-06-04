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

        $id = auth()->id();

        $q1 = Question::
            //ユーザーが選んでいるジャンルの内、（LabelStoragesのselectカラムが１）をwhereinの検索条件にinRandomOrder()しfirst()で１つ取得する。
            wherein('middle_label_id', LabelStorages::where('user_id', $id)->where('select', 1)->select('middle_label_id'))
            ->inRandomOrder()
            ->first();

        if ($q1 === null) {
            // $q1[0]にnullを入れてリターンでgetThreeQuestionsAtRandom()の戻り値を返す
            return [$q1];
        }

        $q2 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNot('answer', $q1?->answer)->inRandomOrder()->first();

        $q3 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1,$q2のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNotIn('answer', [$q1?->answer, $q2?->answer])->inRandomOrder()->first();

        $q4 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1,$q2,$q3のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNotIn('answer', [$q1?->answer, $q2?->answer, $q3?->answer])->inRandomOrder()->first();

        $q5 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1,$q2,$q3,$q4のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNotIn('answer', [$q1?->answer, $q2?->answer, $q3?->answer, $q4?->answer])->inRandomOrder()->first();

        return [$q1, $q2, $q3, $q4, $q5];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function largelabel()
    {
        return $this->belongsTo(LargeLabel::class);
    }

    public function middlelabel()
    {
        return $this->belongsTo(MiddleLabel::class);
    }


    public function answerResult()
    {
        return $this->hasMany(AnswerResults::class);
    }
}
