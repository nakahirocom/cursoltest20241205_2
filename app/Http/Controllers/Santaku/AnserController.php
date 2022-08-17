<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use Illuminate\Http\Request;

// FIXME: change class name and file name (fixed typo)
class AnserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // requestから選択された問題のIDを取得する
        $choiceId = $request->input('choice_id');

        // requestから問題のID [question_id] を取得する
        $questionId = $request->input('question_id');

        // これらを照合させて、同じIDであれば正解とみなす
        if ($choiceId === $questionId) {
            var_dump('正解！');
        } else {
            var_dump('不正解！');
        }
        die();

        // ユーザーが10問解いたら結果画面に遷移
        // そうでなければ次の問題
        return view('santaku.question', ['name' => 'santaku']);
    }
}
