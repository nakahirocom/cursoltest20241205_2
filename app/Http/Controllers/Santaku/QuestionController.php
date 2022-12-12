<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $questions = Question::getThreeQuestionsAtRandom();
        shuffle($questions);

        return view('santaku.question')
            ->with('questions', $questions)
            ->with('question', $questions[0])
            ->with('shuffled0Id', $questions[0]->id)
            ->with('shuffled1Id', $questions[1]->id)
            ->with('shuffled2Id', $questions[2]->id);
    }
}
