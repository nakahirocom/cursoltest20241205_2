<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $questions = Question::getThreeQuestionsAtRandom();

        foreach ($questions as $question) {
            if ($question === null) {
                // nullの要素がある場合は、'santaku.index'ビューにリダイレクトする
                return view('santaku.index');
            }
        }

        $questions_a = $questions; //答え選択肢用の配列
        
//        $question = $questions[0]; //シャッフル前に[0]を正解用として$questionに保存する
        $questions_q = collect($questions)->take(3)->shuffle(); //4問取得したものを前から３つ取得してシャッフルする

        //        shuffle($questions_q);//問題をランダムに出題するためのシャッフル
        shuffle($questions_a); //答えの選択肢をランダムに出題するためのシャッフル

        return view('santaku.question')
            ->with('questions_q', $questions_q)
            ->with('questions_a', $questions_a)
            ->with('question', $question)
            ->with('question1_Id', $questions_q[0]->id)
            ->with('question2_Id', $questions_q[1]->id)
            ->with('question3_Id', $questions_q[2]->id);
    }
}
