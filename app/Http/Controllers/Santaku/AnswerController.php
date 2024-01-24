<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\AnswerResultRequest;
use App\Models\AnswerResults;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class AnswerViewModel
{
    private $choice; //$questionIdをAnswerViewModelの中で定義する
    private $question; //$questionをAnswerViewModelの中で定義する

    //AnswerControllerのnew AnswerViewMoelの引数は、（Questionモデルで$choiceという名前,Questionモデルで$questionという名前）とする。
    public function __construct(Question $choice, Question $question)
    {
        $this->choice = $choice; //選択肢から選んだもののコレクション情報
        $this->question = $question; //出題されたもののコレクション情報
    }

    //出題されたquestionコレクションの中から出題されたquestionを返す
    public function getQuestion(): string
    {
        return $this->question->question;
    }

    //出題されたquestionコレクションの中から正しい正解のanswerを返す
    public function getAnswer(): string
    {
        return $this->question->answer;
    }

    //出題されたquestionコレクションの中からcommentを返す
    public function getComment(): string
    {
        return $this->question->comment;
    }

    //選択されたchoiceコレクションの中から間違えて選択したanswerを返す
    public function getmissQuestion(): string
    {
        return $this->choice->question;
    }

    //選択されたchoiceコレクションの中から間違えて選択したanswerを返す
    public function getmissAnswer(): string
    {
        return $this->choice->answer;
    }

    //選択されたchoiceコレクションの中から間違えて選択したanswerを返す
    public function getmissComment(): string
    {
        return $this->choice->comment;
    }

    //選択されたchoiceコレクションの中のidと出題されたquestionコレクションの中のidが一致しているか判定し、一致ならtrueを返す
    public function isCorrect(): bool
    {
        return $this->choice->id === $this->question->id;
    }
}

class AnswerController extends Controller
{
    public function __invoke(AnswerResultRequest $request)
    {
        //        dump($request);

        // 問題1のidをrequestから取得する
        $question1_Id = $request->input('question1_Id');

        // 問題1に対する選択した1つ目のボタンのIDをrequestから取得する
        $choice1_Id = $request->input('choice1_Id');

        // 問題1の結果をanswer_resultsテーブルへ解答結果を保存する
        $answer_results = new AnswerResults;
        $answer_results->user_id = $request->userId(); // ここでUserIdを保存している
        $answer_results->question_id = $question1_Id;
        $answer_results->answered_question_id = $choice1_Id;
        $answer_results->save();

        // answer_resultsテーブルからcountで選択1の問題別の回答数と正解率の数を集計する
        $allkaitousuu_1 = AnswerResults::where('question_id', '=', $question1_Id)->count();
        $allseikaisuu_1 = AnswerResults::where('question_id', '=', $question1_Id)->whereColumn('question_id', 'answered_question_id')->count();

        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairitu_1 = '';
        if ($allkaitousuu_1 == 0) {
            $seikairitu_1 = 0;
        } else {
            $seikairitu_1 = round($allseikaisuu_1 / $allkaitousuu_1, 2) * 100;
        }



        // 問題2のidをrequestから取得する
        $question2_Id = $request->input('question2_Id');

        // 問題2に対する選択した1つ目のボタンのIDをrequestから取得する
        $choice2_Id = $request->input('choice2_Id');

        // 問題2の結果をanswer_resultsテーブルへ解答結果を保存する
        $answer_results = new AnswerResults;
        $answer_results->user_id = $request->userId(); // ここでUserIdを保存している
        $answer_results->question_id = $question2_Id;
        $answer_results->answered_question_id = $choice2_Id;
        $answer_results->save();

        // answer_resultsテーブルからcountで選択1の問題別の回答数と正解率の数を集計する
        $allkaitousuu_2 = AnswerResults::where('question_id', '=', $question2_Id)->count();
        $allseikaisuu_2 = AnswerResults::where('question_id', '=', $question2_Id)->whereColumn('question_id', 'answered_question_id')->count();

        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairitu_2 = '';
        if ($allkaitousuu_2 == 0) {
            $seikairitu_2 = 0;
        } else {
            $seikairitu_2 = round($allseikaisuu_2 / $allkaitousuu_2, 2) * 100;
        }


        // 問題3のidをrequestから取得する
        $question3_Id = $request->input('question3_Id');

        // 問題3に対する選択した1つ目のボタンのIDをrequestから取得する
        $choice3_Id = $request->input('choice3_Id');

        // 問題3の結果をanswer_resultsテーブルへ解答結果を保存する
        $answer_results = new AnswerResults;
        $answer_results->user_id = $request->userId(); // ここでUserIdを保存している
        $answer_results->question_id = $question3_Id;
        $answer_results->answered_question_id = $choice3_Id;
        $answer_results->save();

        // answer_resultsテーブルからcountで選択1の問題別の回答数と正解率の数を集計する
        $allkaitousuu_3 = AnswerResults::where('question_id', '=', $question3_Id)->count();
        $allseikaisuu_3 = AnswerResults::where('question_id', '=', $question3_Id)->whereColumn('question_id', 'answered_question_id')->count();

        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $seikairitu_3 = '';
        if ($allkaitousuu_3 == 0) {
            $seikairitu_3 = 0;
        } else {
            $seikairitu_3 = round($allseikaisuu_3 / $allkaitousuu_3, 2) * 100;
        }



        // 問題別のみんなの正解率
        $allseikairituModels = [
            $seikairitu_1,
            $seikairitu_2,
            $seikairitu_3,
        ];

        // 問題別のみんなの正解数
        $allkaitousuuModels = [
            $allkaitousuu_1,
            $allkaitousuu_2,
            $allkaitousuu_3,
        ];

        // 回答者を特定する
        $uid = $request->userId();

        // answer_resultssテーブルからcountで回答者の選択1の回答数と正解率の数を集計する
        $uidkaitousuu_1 = DB::table('answer_results')->where('question_id', '=', $question1_Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuu_1 = DB::table('answer_results')->where('question_id', '=', $question1_Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairitu_1 = '';
        if ($uidkaitousuu_1 == 0) {
            $uidseikairitu_1 = 0;
        } else {
            $uidseikairitu_1 = round($uidseikaisuu_1 / $uidkaitousuu_1, 2) * 100;
        }
        // answer_resultssテーブルからcountで回答者の選択2の回答数と正解率の数を集計する
        $uidkaitousuu_2 = DB::table('answer_results')->where('question_id', '=', $question2_Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuu_2 = DB::table('answer_results')->where('question_id', '=', $question2_Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairitu_2 = '';
        if ($uidkaitousuu_2 == 0) {
            $uidseikairitu_2 = 0;
        } else {
            $uidseikairitu_2 = round($uidseikaisuu_2 / $uidkaitousuu_2, 2) * 100;
        }
        // answer_resultssテーブルからcountで回答者の選択3の回答数と正解率の数を集計する
        $uidkaitousuu_3 = DB::table('answer_results')->where('question_id', '=', $question3_Id)->where('user_id', '=', $uid)->count();
        $uidseikaisuu_3 = DB::table('answer_results')->where('question_id', '=', $question3_Id)->where('user_id', '=', $uid)->whereColumn('question_id', 'answered_question_id')->count();
        // 0による割り算エラー防止のためif文で0で割る場合は除算させない
        $uidseikairitu_3 = '';
        if ($uidkaitousuu_3 == 0) {
            $uidseikairitu_3 = 0;
        } else {
            $uidseikairitu_3 = round($uidseikaisuu_3 / $uidkaitousuu_3, 2) * 100;
        }

        // 選択肢別の回答者の正解率をまとめる
        $uidseikairituModels = [
            $uidseikairitu_1,
            $uidseikairitu_2,
            $uidseikairitu_3,
        ];
        // 選択肢別の回答者の正解数をまとめる
        $uidkaitousuuModels = [
            $uidkaitousuu_1,
            $uidkaitousuu_2,
            $uidkaitousuu_3,
        ];

        //Questionデータベースから、idが$question1_Idと一致するものを$ques1に代入を5まで繰返す
        $ques1 = Question::where('id', $question1_Id)->firstOrFail();
        $ques2 = Question::where('id', $question2_Id)->firstOrFail();
        $ques3 = Question::where('id', $question3_Id)->firstOrFail();

        //Questionデータベースから、idが$choice1_Idと一致するものを$cho1に代入を5まで繰返す
        $cho1 = Question::where('id', $choice1_Id)->firstOrFail();
        $cho2 = Question::where('id', $choice2_Id)->firstOrFail();
        $cho3 = Question::where('id', $choice3_Id)->firstOrFail();

        //AnswerViewmodelに$cho1のコレクション, $ques1のコレクションを引数として渡し、処理結果を$viewModel1に代入を5まで繰返す
        $viewModel1 = new AnswerViewModel($cho1, $ques1);
        $viewModel2 = new AnswerViewModel($cho2, $ques2);
        $viewModel3 = new AnswerViewModel($cho3, $ques3);
        $viewModels = [
            $viewModel1,
            $viewModel2,
            $viewModel3,
        ];

        return view('santaku.answer')
            ->with('viewModels', $viewModels)
            ->with('allkaitousuuModels', $allkaitousuuModels)
            ->with('uidkaitousuuModels', $uidkaitousuuModels)
            ->with('allseikairituModels', $allseikairituModels)
            ->with('uidseikairituModels', $uidseikairituModels);

    }
}
