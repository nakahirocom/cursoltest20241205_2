<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\UpdateRequest;
use App\Models\Question;
use App\Services\SantakuService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, SantakuService $santakuService)
    {
        if (! $santakuService->checkOwnMondai(
            $request->user()->id,
            $request->id()
        )) {
            return redirect()
                ->route('list')
                ->with('feedback.success', '他のユーザーの問題は更新出来ません');

            throw new AccessDeniedHttpException();
        }

        $question = Question::where('id', $request->id())->firstOrFail();
        $question->question = $request->question();
        $question->answer = $request->answer();
        $question->comment = $request->comment();
        $question->save();

        return redirect()
            ->route('edit', ['questionId' => $question->id])
            ->with('feedback.success', '編集が完了しました');
    }
}
