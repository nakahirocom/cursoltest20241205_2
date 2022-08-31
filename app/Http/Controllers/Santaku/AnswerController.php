<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __invoke(Request $request)
  {
    // requestから選択された問題のIDを取得する
        $choiceId = $request->input('choice_id');
//      dump($choiceId);
    $choiced = Santaku::where('id', $choiceId)->firstOrFail();

        // requestから問題のID [question_id] を取得する
        $questionId = $request->input('question_id');
        //
        $questioned = Santaku::where('id', $questionId)->firstOrFail();

        //シャッフル後の出題idをquestion.brade.phpから取得
        $shuffled0Id = $request->input('shuffled0Id');
        $shuffled1Id = $request->input('shuffled1Id');
        $shuffled2Id = $request->input('shuffled2Id');
//        dump($shuffled0Id);
//        dump($shuffled1Id);
//        dump($shuffled2Id);
        $shuffled0 = Santaku::where('id', $shuffled0Id)->firstOrFail();
//        dump($shuffled0);
        $shuffled1 = Santaku::where('id', $shuffled1Id)->firstOrFail();
//        dump($shuffled1);
        $shuffled2 = Santaku::where('id', $shuffled2Id)->firstOrFail();
//        dump($shuffled2);

// シャッフルした選択肢１問目のIdでdbからコレクションをshuffled0に保存する。
$shuffled0 = Santaku::where('id', $shuffled0Id)->firstOrFail();
//  shuffled0を表示
dump($shuffled0);

// シャッフル１問目のIdと出題のIdを照合させて、同じIDであれば正解。違えば不正解をコレクションに追加。
        if ($shuffled0Id === $questionId) {
          $shuffled0->push('seigo0','正解!');
       } else {
          $shuffled0->push('seigo0','不正解!');
        };
// if文で正解か不正解をコレクションに追加後の$shuffled0を表示させる
dump($shuffled0);


// シャッフル２問目のIdと出題のIdを照合させて、同じIDであれば正解。違えば不正解をコレクションに追加。
if ($shuffled1Id === $questionId) {
          $seigo1 = '正解!';  
//          var_dump($seigo);
       } else {
          $seigo1 = '不正解!';  
        };

// シャッフル３問目のIdと出題のIdを照合させて、同じIDであれば正解。違えば不正解をコレクションに追加。
if ($shuffled2Id === $questionId) {
          $seigo2 = '正解!';  
       } else {
          $seigo2 = '不正解!';  
        };


        // questionIdと選択したIdを照合させて、同じIDであれば正解とみなす
        if ($choiceId === $questionId) {
          $seigo = '正解!';  
//          var_dump($seigo);
       } else {
          $seigo = '不正解!';  
        };






        return view('santaku.answer')
            ->with('questioned', $questioned)
            ->with('choiced', $choiced)

            ->with('seigo', $seigo)

            ->with('shuffled0', $shuffled0)
            ->with('shuffled1', $shuffled1)
            ->with('shuffled2', $shuffled2);

        // ユーザーが10問解いたら結果画面に遷移
        // そうでなければ次の問題
  }
}
