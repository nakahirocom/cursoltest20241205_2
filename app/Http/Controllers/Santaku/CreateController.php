<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //登録した問題をdbへ保存する処理を追加する必要あり

        //インデックス画面へリダイレクト
        return view('santaku.index', ['name' => 'santaku']);

    }
}
