<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnswerResults;
use App\Models\Question;



class SantakusetController extends Controller
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
                        ->whereColumn('question_id', '!=', 'answered_question_id')
                        ->where('user_id', '=', $id)
                        ->orderBy('created_at', 'DESC')
                        ->get();
                dump($incorrectList);

                return view('santaku.santakuset')
                        ->with('incorrectList', $incorrectList);
        }
}
