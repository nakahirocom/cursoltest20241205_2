<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = User::orderBy('continuous_correct_answers', 'DESC')->get();
        $authId = auth()->id();

        return view('santaku.index')
            ->with('users', $users)
            ->with('currentUser', $authId);
    }
}
