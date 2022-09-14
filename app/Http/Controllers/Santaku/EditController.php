<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use App\Services\SantakuService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SantakuService $santakuService)
    {
        $santakuId = (int) $request->route('santakuId');
        if (!$santakuService->checkOwnMondai($request->user()->id, $santakuId)) {
            return redirect()
                ->route('list')
                ->with('feedback.success', "他のユーザーの問題は編集出来ません");

            throw new AccessDeniedHttpException();
        }

        $santaku = Santaku::where('id', $santakuId)->firstOrFail();

        return view('santaku.edit')->with('santaku', $santaku);
    }
}
