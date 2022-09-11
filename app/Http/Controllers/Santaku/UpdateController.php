<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\UpdateRequest;
use App\Models\Santaku;
use App\Services\SantakuService;
use Illuminate\Http\Request;
use symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        if (!$santakuService->checkOwnMondai($request->user()->id,
            $request->id())) 
            {
                return redirect()
                ->route('list')
                ->with('feedback.success', "他のユーザーの問題は更新出来ません");
        
                throw new AccessDeniedHttpException();
            }
            

    
    $santaku = Santaku::where('id', $request->id())->firstOrFail();
    $santaku->question = $request->question();
    $santaku->answer = $request->answer();
    $santaku->comment = $request->comment();
//    dd($santaku);
    $santaku->save();
//    return redirect()
    return redirect()
        ->route('edit', ['santakuId' => $santaku->id])
        ->with('feedback.success',"編集が完了しました");
    }
}
