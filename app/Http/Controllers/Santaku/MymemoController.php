<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Mymemo;
use App\Models\Question;
use App\Services\SantakuService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Illuminate\Http\Request;

class MymemoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SantakuService $santakuService)
    {
        $uid = $request->user()->id;

        $questionId = (int) $request->route('questionId');
        if (!$santakuService->checkOwnMondai($request->user()->id, $questionId)) {
            return redirect()
                ->route('list')
                ->with('feedback.success', '他のユーザーの問題は編集出来ません');

            throw new AccessDeniedHttpException();
        }

        $question = Question::where('id', $questionId)
        ->with(['Mymemo' => function ($query) use ($uid, $questionId) {
            $query->where('user_id', $uid)
                ->where('question_id', $questionId); // ユーザーIDと質問IDの両方でフィルタリング
        }])
        ->firstOrFail();
        //dump($question);

        return view('santaku.mymemo')->with('question', $question);
    }
}
