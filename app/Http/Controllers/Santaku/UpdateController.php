<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\UpdateRequest;
use App\Models\Santaku;
use Illuminate\Http\Request;
use symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request)
    {
    $santaku = Santaku::where('id', $request->id())->firstOrFail();
    $santaku->question = $request->santaku();
    $santaku->anser = $request->santaku();
    $santaku->comment = $request->santaku();
    $santaku->save();
//    return redirect()
    return view('santaku.list')

    //    ->route('update.index', ['santakuId' => $santaku->id])
        ->with('feedback.success',"編集が完了しました");
    }
}
