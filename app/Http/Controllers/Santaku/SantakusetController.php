<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\LabelStorages;
use App\Models\LargeLabel;
use App\Models\MiddleLabel;
use App\Models\SmallLabel;
use App\Models\Question;

use Illuminate\Http\Request;

class SantakusetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // 現在認証しているユーザーのIDを取得
        $id = auth()->id();

        //　ログインしたユーザーの選んだジャンルを呼び出し、Eagerロードのためにwith([ミドルラベル、ラージラベル])してdbへのアクセスを少なくする
        $selectList = LabelStorages::where('user_id', $id)->with('smallLabel.middleLabel.largeLabel')->get();
//dump($selectList);
        $smalelabelList = SmallLabel::all();

        // 両方のリストの数を比較
        // $selectListと$smalelabelListの数が異なる、かつ$selectListにない$smalelabelListの要素を追加
        if ($selectList->count() != $smalelabelList->count()) {
            foreach ($smalelabelList as $item) {
                // $selectListに$itemが含まれていないかチェック
                if (!$selectList->contains('small_label_id', $item->id)) {
                    $selectNewList = new LabelStorages();
                    $selectNewList->user_id = $id; // UserIdを保存
                    $selectNewList->small_label_id = $item->id; // small_label_idを登録
                    $selectNewList->selected = 1; // 中分類を選んだ状態の「1」を登録
                    $selectNewList->save();
                }
            }
        } else {
            // $selectListと$smalelabelListの数が同じ場合の処理
            // ここに必要なコードを記述します
        }

        // MiddleLabelごとに関連するQuestionの数を取得
        $middleQuestionCounts = MiddleLabel::leftJoin('small_labels', 'middle_labels.id', '=', 'small_labels.middle_label_id')
            ->leftJoin('questions', 'small_labels.id', '=', 'questions.small_label_id')
            ->select('middle_labels.id')
            ->selectRaw('COUNT(questions.id) as question_count')
            ->groupBy('middle_labels.id')
            ->get()
            ->pluck('question_count', 'id');

        // SmallLabelごとに関連するQuestionの数を取得
        $smallQuestionCounts = SmallLabel::leftJoin('questions', 'small_labels.id', '=', 'questions.small_label_id')
            ->select('small_labels.id')
            ->selectRaw('COUNT(questions.id) as question_count')
            ->groupBy('small_labels.id')
            ->get()
            ->pluck('question_count', 'id');

        // $selectListにMiddleLabelとSmallLabelのquestion_countを追加
        foreach ($selectList as $labelStorage) {
            $middleLabelId = $labelStorage->smallLabel->middle_label_id;
            $smallLabelId = $labelStorage->small_label_id;
            $labelStorage->middle_question_count = $middleQuestionCounts->get($middleLabelId, 0);
            $labelStorage->small_question_count = $smallQuestionCounts->get($smallLabelId, 0);
        }
        //dump($selectList);

        $largelabelList = LargeLabel::all();
        $middlelabelList = MiddleLabel::all();

        // small_labelごとに関連するquestionの数を取得
        // small_labelごとに関連するquestionの数を取得し、0を設定
//        $questionCounts = SmallLabel::leftJoin('questions', 'small_labels.id', '=', 'questions.small_label_id')
//            ->select('small_labels.id')
//            ->selectRaw('COUNT(questions.id) as count')
//            ->groupBy('small_labels.id')
//            ->get()
//            ->pluck('count', 'id');
        //dd($questionCounts);

//        // smallLabelList に questionCounts の各ジャンルの問題数を加える
//        foreach ($smalelabelList as $label) {
//            $label->question_count = $questionCounts->get($label->id, 0);
//        }
//        
//        // dump($smalelabelList); // 追加後の確認用
//        dd($smalelabelList);
//
        return view('santaku.santakuset')
            ->with('selectList', $selectList)
            ->with('largelabelList', $largelabelList)
            ->with('middlelabelList', $middlelabelList);
    }
}
