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
        $question = $questions[0]; //シャッフル前に[0]を正解用として$questionに保存する
        shuffle($questions);

        return view('santaku.question')
            ->with('questions', $questions)
            ->with('question', $question)
            ->with('shuffled0Id', $questions[0]->id)
            ->with('shuffled1Id', $questions[1]->id)
            ->with('shuffled2Id', $questions[2]->id)
            ->with('shuffled3Id', $questions[3]->id)
            ->with('shuffled4Id', $questions[4]->id);
    }
}
