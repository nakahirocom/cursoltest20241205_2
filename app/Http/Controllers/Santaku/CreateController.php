<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Santaku\CreateRequest;
use App\Models\Santaku;

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
        $santaku = new Santaku;
        $santaku->question = $request->santaku();
        $santaku->anser = $request->santaku();
        $santaku->comment = $request->santaku();
        $santaku->save();
        return redirect()->route('index');
        //インデックス画面へリダイレクト
//        return view('santaku.index', ['name' => 'santaku']);

    }
}
