<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santaku;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $santakuId = (int) $request->route('santakuId');
        $santaku = Santaku::where('id', $santakuId)->firstOrFail();
        $santaku->delete();
        return redirect()
            ->route('list')
            ->with('feedback.success', "問題を削除しました");
    }
}
