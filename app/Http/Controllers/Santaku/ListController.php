<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use App\Services\SantakuService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ListController extends Controller
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
        $santaku = Santaku::orderBy('created_at', 'DESC')->get();
   
        return view('santaku.list')
            ->with('santaku', $santaku);
    }
}
