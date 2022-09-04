<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\Santaku;
use Illuminate\Http\Request;

class AnswerViewModel {
    private $questionId;
    private $santaku;

    public function __construct(int $questionId, Santaku $santaku) {
        $this->questionId = $questionId;
        $this->santaku = $santaku;
    }

    public function getQuestion(): string {
        return $this->santaku->question;
    }

    public function getAnswer(): string {
        return $this->santaku->answer;
    }

    public function isCorrect(): bool {
        return $this->questionId === $this->santaku->id;
    }
}

class AnswerController extends Controller
{
    public function __invoke(Request $request)
    {
        // requestから選択された問題のIDを取得する
        $choiceId = $request->input('choice_id');
        $choiced = Santaku::where('id', $choiceId)->firstOrFail();

        // requestから問題のID [question_id] を取得する
        $questionId = $request->input('question_id');
        $questioned = Santaku::where('id', $questionId)->firstOrFail();

        // シャッフル後の出題idをquestion.brade.phpから取得
        $shuffled0Id = $request->input('shuffled0Id');
        $shuffled1Id = $request->input('shuffled1Id');
        $shuffled2Id = $request->input('shuffled2Id');

        $shuffled0 = Santaku::where('id', $shuffled0Id)->firstOrFail();
        $shuffled1 = Santaku::where('id', $shuffled1Id)->firstOrFail();
        $shuffled2 = Santaku::where('id', $shuffled2Id)->firstOrFail();

        $viewModel1 = new AnswerViewModel($questionId, $shuffled0);
        $viewModel2 = new AnswerViewModel($questionId, $shuffled1);
        $viewModel3 = new AnswerViewModel($questionId, $shuffled2);
        $viewModels = [
            $viewModel1,
            $viewModel2,
            $viewModel3
        ];
        $isCorrect = $questionId === $choiceId;

        return view('santaku.answer')
            ->with('questioned', $questioned)
            ->with('choiced', $choiced)
            ->with('isCorrect', $isCorrect)
            ->with('viewModels', $viewModels);

        // ユーザーが10問解いたら結果画面に遷移
        // そうでなければ次の問題
  }
}
