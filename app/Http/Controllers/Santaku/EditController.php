<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use Illuminate\Http\Request;

class EditController extends Controller
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
    dump($santakuId);
    $santaku = Santaku::where('id', $santakuId)->firstOrFail();

//        dd($santaku);

    return view('santaku.edit')->with('santaku',$santaku);
    }
}
