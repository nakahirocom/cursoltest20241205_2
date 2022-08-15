<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//mysqlからランダムに３つを取ってくる
        $santaku = Santaku::inRandomOrder()->take(3)->get();
//      echo print_r($santaku);
//      dd($santaku);

// ループを止めるためのカウンター初期値設定
$counter = 0;
// 問題をランダムに並べるための$array[重複なしの1〜３ランダム数字]
$array = range(1, 3);
shuffle($array);
$array = array_slice($array, 0, 3);
print_r($array);

        $seikai = $santaku[0];

        $mondai1 = $santaku[$array[0]-1];
        $mondai2 = $santaku[$array[1]-1];
        $mondai3 = $santaku[$array[2]-1];

        return view('santaku.question')
            ->with('seikai', $seikai)
            ->with('mondai1', $mondai1)
            ->with('mondai2', $mondai2)
            ->with('mondai3', $mondai3)
            ->with('santaku', $santaku)
            ->with('counter', $counter);

        }
}
