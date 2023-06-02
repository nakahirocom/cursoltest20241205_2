<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\AnswerResults;
use Illuminate\Http\Request;

class MistakeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // 現在認証しているユーザーのIDを取得
        $id = auth()->id();
        //　不正解問題（正解idと解答idが不一致）で認証ユーザーの問題を新しい日時順でdbから抽出する
        $incorrectList = AnswerResults::with('question')
            ->whereColumn('answer_results.question_id', '!=', 'answer_results.answered_question_id')
            ->where('answer_results.user_id', '=', $id)
            ->select(
                'answer_results.id',
                'answer_results.user_id',
                'answer_results.question_id',
                'answer_results.answered_question_id',
                'answer_results.updated_at',
                'questions.id as q_id',
                'questions.question as q_question',
                'questions.answer as q_answer',
                'questions.comment as q_comment'
            )
            ->join(
                'questions',
                'answer_results.answered_question_id',
                '=',
                'questions.id'
            )
            ->orderBy('answer_results.created_at', 'DESC')
            ->get();

        return view('santaku.mistake')
            ->with('incorrectList', $incorrectList);
    }
}
