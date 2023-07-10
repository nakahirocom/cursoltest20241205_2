<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\LabelStorages;
use App\Models\LargeLabel;
use Illuminate\Http\Request;

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
        //　ログインしたユーザーの選んだジャンルを呼び出し、Eagerロードのためにwith([ミドルラベル、ラージラベル])してdbへのアクセスを少なくする
        $selectList = LabelStorages::where('user_id', $id)->with(['middlelabel', 'largelabel'])->get();
        $largelabelList = LargeLabel::all();

        return view('santaku.santakuset')
            ->with('selectList', $selectList)
            ->with('largelabelList', $largelabelList);
    }
}
