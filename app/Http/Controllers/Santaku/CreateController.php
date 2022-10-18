<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\CreateRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        //⭐️登録した問題の全てがquestionに保存されていることを修正必要。dbへ保存する処理を追加する必要あり
        $question = new Question;
        $question->user_id = $request->userId(); // ここでUserIdを保存している
        $question->question = $request->question();
        $question->answer = $request->answer();
        $question->comment = $request->comment();
        $question->save();

        return redirect()->route('index');
        //インデックス画面へリダイレクト
        //        return view('santaku.index', ['name' => 'question']);
    }
}
