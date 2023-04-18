<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\AnswerResultRequest;
use App\Models\AnswerResults;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class AnswerViewModel
{
    private $questionId;

    private $question;

    public function __construct(int $questionId, Question $question)
    {
        $this->questionId = $questionId;
        $this->question = $question;
    }

    public function getQuestion(): string
    {
        return $this->question->question;
    }

    public function getAnswer(): string
    {
        return $this->question->answer;
    }

    public function getComment(): string
    {
        return $this->question->comment;
    }

    public function isCorrect(): bool
    {
        return $this->questionId === $this->question->id;
    }
}

class AnswerController extends Controller
{
    public function __invoke(AnswerResultRequest $request)
    {
        // requestから選択された問題のIDを取得する
        $choiceId = $request->input('choice_id');
        $choiceQuestion = Question::where('id', $choiceId)->firstOrFail();

        // requestから問題のID [question_id] を取得する
        $questionId = $request->input('question_id');
        $questioned = Question::where('id', $questionId)->firstOrFail();

        // answer_resultsテーブルへ解答結果を保存する
        $answer_results = new AnswerResults;
        $answer_results->user_id = $request->userId(); // ここでUserIdを保存している
        $answer_results->question_id = $questionId;
        $answer_results->answered_question_id = $choiceId;
        $answer_results->save();

        // シャッフル後の出題idをquestion.brade.phpから取得
        $shuffled0Id = $request->input('shuffled0Id');
        $shuffled1Id = $request->input('shuffled1Id');
        $shuffled2Id = $request->input('shuffled2Id');
        $shuffled3Id = $request->input('shuffled3Id');
        $shuffled4Id = $request->input('shuffled4Id');

        // answer_resultsテーブルからcountで選択1の問題別の回答数と正解率の数を集計する
        $allkaitousuuS0 = DB::table('answer_results')->where('question_id', '=', $shuffled0Id)->count();
        $allseikaisuuS0 = DB::table('answer_results')->where('question_id', '=', $shuffled0Id)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairituS0 = '';
        if ($allkaitousuuS0 == 0) {
            $seikairituS0 = 0;
        } else {
            $seikairituS0 = round($allseikaisuuS0 / $allkaitousuuS0, 2) * 100;
        }

        // answer_resultsテーブルからcountで選択2の問題別の回答数と正解率の数を集計する
        $allkaitousuuS1 = DB::table('answer_results')->where('question_id', '=', $shuffled1Id)->count();
        $allseikaisuuS1 = DB::table('answer_results')->where('question_id', '=', $shuffled1Id)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairituS1 = '';
        if ($allkaitousuuS1 == 0) {
            $seikairituS1 = 0;
        } else {
            $seikairituS1 = round($allseikaisuuS1 / $allkaitousuuS1, 2) * 100;
        }
        // answer_resultsテーブルからcountで選択3の問題別の回答数と正解率の数を集計する
        $allkaitousuuS2 = DB::table('answer_results')->where('question_id', '=', $shuffled2Id)->count();
        $allseikaisuuS2 = DB::table('answer_results')->where('question_id', '=', $shuffled2Id)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairituS2 = '';
        if ($allkaitousuuS2 == 0) {
            $seikairituS2 = 0;
        } else {
            $seikairituS2 = round($allseikaisuuS2 / $allkaitousuuS2, 2) * 100;
        }

        // answer_resultsテーブルからcountで選択4の問題別の回答数と正解率の数を集計する
        $allkaitousuuS3 = DB::table('answer_results')->where('question_id', '=', $shuffled3Id)->count();
        $allseikaisuuS3 = DB::table('answer_results')->where('question_id', '=', $shuffled3Id)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairituS3 = '';
        if ($allkaitousuuS3 == 0) {
            $seikairituS3 = 0;
        } else {
            $seikairituS3 = round($allseikaisuuS3 / $allkaitousuuS3, 2) * 100;
        }

        // answer_resultsテーブルからcountで選択5の問題別の回答数と正解率の数を集計する
        $allkaitousuuS4 = DB::table('answer_results')->where('question_id', '=', $shuffled4Id)->count();
        $allseikaisuuS4 = DB::table('answer_results')->where('question_id', '=', $shuffled4Id)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairituS4 = '';
        if ($allkaitousuuS4 == 0) {
            $seikairituS4 = 0;
        } else {
            $seikairituS4 = round($allseikaisuuS4 / $allkaitousuuS4, 2) * 100;
        }


        // 問題別のみんなの正解率
        $allseikairituModels = [
            $seikairituS0,
            $seikairituS1,
            $seikairituS2,
            $seikairituS3,
            $seikairituS4,
        ];

        // 問題別のみんなの正解数
        $allkaitousuuModels = [
            $allkaitousuuS0,
            $allkaitousuuS1,
            $allkaitousuuS2,
            $allkaitousuuS3,
            $allkaitousuuS4,
        ];

        // 回答者を特定する
        $uid = $request->userId();

        // answer_resultssテーブルからcountで回答者の選択1の回答数と正解率の数を集計する
        $uidkaitousuuS0 = DB::table('answer_results')->where('question_id', '=', $shuffled0Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuuS0 = DB::table('answer_results')->where('question_id', '=', $shuffled0Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairituS0 = '';
        if ($uidkaitousuuS0 == 0) {
            $uidseikairituS0 = 0;
        } else {
            $uidseikairituS0 = round($uidseikaisuuS0 / $uidkaitousuuS0, 2) * 100;
        }
        // answer_resultssテーブルからcountで回答者の選択2の回答数と正解率の数を集計する
        $uidkaitousuuS1 = DB::table('answer_results')->where('question_id', '=', $shuffled1Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuuS1 = DB::table('answer_results')->where('question_id', '=', $shuffled1Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairituS1 = '';
        if ($uidkaitousuuS1 == 0) {
            $uidseikairituS1 = 0;
        } else {
            $uidseikairituS1 = round($uidseikaisuuS1 / $uidkaitousuuS1, 2) * 100;
        }
        // answer_resultssテーブルからcountで回答者の選択3の回答数と正解率の数を集計する
        $uidkaitousuuS2 = DB::table('answer_results')->where('question_id', '=', $shuffled2Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuuS2 = DB::table('answer_results')->where('question_id', '=', $shuffled2Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairituS2 = '';
        if ($uidkaitousuuS2 == 0) {
            $uidseikairituS2 = 0;
        } else {
            $uidseikairituS2 = round($uidseikaisuuS2 / $uidkaitousuuS2, 2) * 100;
        }
        // answer_resultssテーブルからcountで回答者の選択4の回答数と正解率の数を集計する
        $uidkaitousuuS3 = DB::table('answer_results')->where('question_id', '=', $shuffled3Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuuS3 = DB::table('answer_results')->where('question_id', '=', $shuffled3Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairituS3 = '';
        if ($uidkaitousuuS3 == 0) {
            $uidseikairituS3 = 0;
        } else {
            $uidseikairituS3 = round($uidseikaisuuS3 / $uidkaitousuuS3, 2) * 100;
        }
        // answer_resultssテーブルからcountで回答者の選択4の回答数と正解率の数を集計する
        $uidkaitousuuS4 = DB::table('answer_results')->where('question_id', '=', $shuffled4Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuuS4 = DB::table('answer_results')->where('question_id', '=', $shuffled4Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairituS4 = '';
        if ($uidkaitousuuS4 == 0) {
            $uidseikairituS4 = 0;
        } else {
            $uidseikairituS4 = round($uidseikaisuuS4 / $uidkaitousuuS4, 2) * 100;
        }

        // 選択肢別の回答者の正解率をまとめる
        $uidseikairituModels = [
            $uidseikairituS0,
            $uidseikairituS1,
            $uidseikairituS2,
            $uidseikairituS3,
            $uidseikairituS4,
        ];
        // 選択肢別の回答者の正解数をまとめる
        $uidkaitousuuModels = [
            $uidkaitousuuS0,
            $uidkaitousuuS1,
            $uidkaitousuuS2,
            $uidkaitousuuS3,
            $uidkaitousuuS4,
        ];

        $shuffled0 = Question::where('id', $shuffled0Id)->firstOrFail();
        $shuffled1 = Question::where('id', $shuffled1Id)->firstOrFail();
        $shuffled2 = Question::where('id', $shuffled2Id)->firstOrFail();
        $shuffled3 = Question::where('id', $shuffled3Id)->firstOrFail();
        $shuffled4 = Question::where('id', $shuffled4Id)->firstOrFail();

        $viewModel1 = new AnswerViewModel($questionId, $shuffled0);
        $viewModel2 = new AnswerViewModel($questionId, $shuffled1);
        $viewModel3 = new AnswerViewModel($questionId, $shuffled2);
        $viewModel4 = new AnswerViewModel($questionId, $shuffled3);
        $viewModel5 = new AnswerViewModel($questionId, $shuffled4);
        $viewModels = [
            $viewModel1,
            $viewModel2,
            $viewModel3,
            $viewModel4,
            $viewModel5,
        ];

        $isCorrect = $questionId === $choiceId;

        return view('santaku.answer')
            ->with('questioned', $questioned)
            ->with('choiceQuestion', $choiceQuestion)
            ->with('isCorrect', $isCorrect)
            ->with('viewModels', $viewModels)
            ->with('allkaitousuuModels', $allkaitousuuModels)
            ->with('uidkaitousuuModels', $uidkaitousuuModels)
            ->with('allseikairituModels', $allseikairituModels)
            ->with('uidseikairituModels', $uidseikairituModels);

        // ユーザーが10問解いたら結果画面に遷移
        // そうでなければ次の問題
    }
}
