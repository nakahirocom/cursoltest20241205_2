<?php

namespace App\Services;

use App\Models\Question;

class SantakuService
{
    //自分の作成問題かをチェックするメソッド
    public function checkOwnMondai(int $userId, int $questionId): bool
    {
        $question = Question::where('id', $questionId)->first();
        if (! $question) {
            return false;
        }

        return $question->user_id === $userId;
    }
}
