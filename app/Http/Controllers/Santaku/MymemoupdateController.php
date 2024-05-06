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
    public function __invoke(MymemoupdateRequest $request, SantakuService $santakuService)
    {

        // データベースから私のメモを取得し、更新する
        $mymemo = Mymemo::where('question_id', $request->user()->id)->firstOrFail();
        $mymemo->mymemo = $request->mymemo;
        $mymemo->save();

        return redirect()
            ->route('mymemo', ['questionId' => $mymemo->id])
            ->with('feedback.success', '私のメモを更新しました');
    }
}
