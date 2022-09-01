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
        // 配列にする
        $questionToArray = ($question->toarray());
        // 配列からidを取得する
        $questionId = ($questionToArray['id']);

//　配列から取得したidをデバック表示させる
//            dump($questionId);

//        $santaku = Santaku::where('id', $questionId)->firstOrFail();
//        dump($santaku);



         // 選択肢をランダムに並び替える
        $shuffled = $questions->shuffle();

        $shuffled0 = $shuffled[0];
        $shuffled0Id = $shuffled0->id;

        $shuffled1 = $shuffled[1];
        $shuffled1Id = $shuffled1->id;

        $shuffled2 = $shuffled[2];
        $shuffled2Id = $shuffled2->id;
        //処理が止まらずに出力する
//        dump($shuffled0Id);
//        dump($shuffled1Id);
//        dump($shuffled2Id);


        return view('santaku.question')
            ->with('question', $question)

            ->with('shuffled0Id', $shuffled0Id)
            ->with('shuffled1Id', $shuffled1Id)
            ->with('shuffled2Id', $shuffled2Id)

            ->with('questions', $shuffled);

        }
}
