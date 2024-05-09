<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mymemo;
use App\Services\SantakuService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class MymemodeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SantakuService $santakuService)
    {
        $questionId = (int) $request->route('questionId');
        if (!$santakuService->checkOwnMondai($request->user()->id, $questionId)) {
            return redirect()
                ->route('list')
                ->with('feedback.success', '他のユーザーの問題は削除出来ません');

            throw new AccessDeniedHttpException();
        }

        $mymemo = Mymemo::where('question_id', $questionId)->firstOrFail();
        $messege =$mymemo->mymemo;
        $mymemo->delete();

        return redirect()
            ->route('mymemolist')
            ->with('feedback.success', '['.$messege.']のメモを削除しました');
    }
}
