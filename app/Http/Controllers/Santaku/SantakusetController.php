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
        $question = Question::orderBy('created_at', 'DESC')->get();
        $questionanser = $question->answerresult;
        dd($questionanser);
        // 現在認証しているユーザーのIDを取得
        $id = auth()->id();
        //　不正解問題（正解idと解答idが不一致）で認証ユーザーの問題を新しい日時順でdbから抽出する
        $IncorrectList = AnswerResults::whereColumn('question_id','!=', 'answered_question_id')
                                        ->where('user_id','=', $id)
                                        ->orderBy('created_at', 'DESC')
                                        ->get();


        $a= ($IncorrectList->pluck("question_id"));
        dump($a);
        dump($a[0]);
        $IncorrectList10 = question::whereIn('id', [$a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6],$a[7],$a[8],$a[9]])
                                     ->orderByRaw("FIELD(id,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6],$a[7],$a[8],$a[9])")
                                     ->get();
        dump($IncorrectList10);
//        $b= ($questionList->pluck("answered_question_id"));
//         dump($b);
 //       $c= array_merge($a,$b);
 //        dump($c);
        // 配列にする
//        $IncorrectListToArray = ($IncorrectList->toarray());
//        dd($IncorrectListToArray);

        // 配列からidを取得する
//        $questionId = ($IncorrectListToArray['question_id']);
//        dd($questionId);




        return view('santaku.santakuset')
            ->with('IncorrectList10', $IncorrectList10);
    }
}
