<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SantakuService;
use App\Http\Requests\Santaku\MymemoupdateRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Models\Mymemo;

class MymemoupdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(MymemoupdateRequest $request, $questionId)
    {
        // 現在認証しているユーザーのIDを取得
        $id = auth()->id();

        // user_id と question_id で Mymemo レコードを探し、なければ新規作成またはあれば更新
        $mymemo = Mymemo::updateOrCreate(
            ['user_id' => $id, 'question_id' => $questionId], // 検索条件
            ['mymemo' => $request->mymemo] // 更新または新規作成時にセットする値
        );

        // リダイレクトとフィードバックメッセージ
        return redirect()
            ->route('mymemo', ['questionId' => $mymemo->id])
            ->with('feedback.success', '私のメモを更新しました');
    }
}
