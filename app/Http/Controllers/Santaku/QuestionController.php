<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // mysqlからランダムに３つを取ってくる
        $questions = Santaku::inRandomOrder()->take(3)->get();

        // ランダムにとってきた問題の配列に対して、先頭のものを問題とする
        $question = $questions[0];

        // 選択肢をランダムに並び替える
        $shuffled = $questions->shuffle();

        return view('santaku.question')
            ->with('question', $question)
            ->with('questions', $shuffled);
    }
}
