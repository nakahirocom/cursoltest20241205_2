<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\LabelStorages;
use App\Models\LargeLabel;
use App\Models\MiddleLabel;
use App\Models\SmallLabel;
use App\Models\Question;
use App\Models\User;
use App\Models\Rank;
use App\Models\AnswerResults;
use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;

class MasterController extends Controller
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
        $currentUserId = auth()->id();
        // 全ユーザーの最新の解答結果を取得
        $latestAnswerResults = AnswerResults::select('user_id', 'question_id', 'answered_question_id', 'created_at', 'start_solving_time')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('user_id')
            ->map(function ($userResults) {
                return $userResults->unique('question_id');
            });
//dd($latestAnswerResults);
        // 各ユーザーごとにデータをフラット化して処理
        $results = $latestAnswerResults->map(function ($userResults) {
            return $userResults->map(function ($answerResult) {
                $question = Question::find($answerResult->question_id);
                $isCorrect = $answerResult->answered_question_id == $question->id;
                $timeDiffMilliseconds = Carbon::parse($answerResult->created_at)->diffInMilliseconds(Carbon::parse($answerResult->start_solving_time)); // ミリ秒単位で取得
                $timeDiff = $timeDiffMilliseconds / 1000; // 秒単位に変換

                return [
                    'small_label_id' => $question->small_label_id,
                    'is_correct' => $isCorrect,
                    'time_diff' => $timeDiff
                ];
            });
        });

        // ユーザーごとに small_label_id 毎の集計を行う
        $summary = $results->map(function ($userResults) {
            return $userResults->groupBy('small_label_id')->map(function ($group) {
                $totalCorrect = $group->where('is_correct', true)->count();
                $totalQuestions = $group->count();
                $totalTimeDiff = $group->sum('time_diff');
                $averageTime = $totalQuestions > 0 ? $totalTimeDiff / $totalQuestions : 0;
                $accuracy = $totalQuestions > 0 ? $totalCorrect / $totalQuestions * 100 : 0;
                // 条件に合わない場合は null を返す
                if ($totalQuestions < 10) { // 条件を10問以上に変更
                    return null;
                }

                return [
                    'correct' => $totalCorrect,
                    'incorrect' => $totalQuestions - $totalCorrect,
                    'total' => $totalQuestions,
                    'accuracy' => number_format($accuracy, 1),
                    'average_time' => number_format($averageTime, 2)
                ];
            })->filter(); // null の結果をフィルタリング
        });
//dd($summary);

        // small_label_id の昇順に並べ替え
        $sortedSummary = $summary->map(function ($userSummary) {
            return $userSummary->sortKeys();
        });

        // small_label_idごとのデータを取得
        $smallLabelSummary = [];

        foreach ($sortedSummary as $userId => $userSummary) {
            foreach ($userSummary as $smallLabelId => $data) {
                if (!isset($smallLabelSummary[$smallLabelId])) {
                    $smallLabelSummary[$smallLabelId] = [];
                }
                $smallLabelSummary[$smallLabelId][$userId] = $data;
            }
        }

        // $smallLabelSummaryをsmall_label_idの昇順に並べる
        ksort($smallLabelSummary);

        // 各ユーザーの結果をユーザーIDの昇順に並べる
        foreach ($smallLabelSummary as $smallLabelId => $userResults) {
            ksort($userResults);
        }

        // accuracyの降順、同じaccuracyならaverage_timeの昇順に並べ替える関数
        function sortResults($results) {
            uasort($results, function($a, $b) {
                if ($a['accuracy'] == $b['accuracy']) {
                    return $a['average_time'] <=> $b['average_time'];
                }
                return $b['accuracy'] <=> $a['accuracy'];
            });
            return $results;
        }
        // 各small_label_idごとに並べ替える
        foreach ($smallLabelSummary as $smallLabelId => $userResults) {
            $smallLabelSummary[$smallLabelId] = sortResults($userResults);
        }

        // ユーザー情報を取得
        $users = User::pluck('name', 'id');

        // small_labelsテーブルの情報を取得
        $smallLabels = SmallLabel::pluck('small_label', 'id');

        // 各ユーザーごとに順位を追加し、名前とsmall_labelを含める
        foreach ($smallLabelSummary as $smallLabelId => $userResults) {
            $rank = 1;
            foreach ($userResults as $userId => $data) {
                $smallLabelSummary[$smallLabelId][$userId]['rank'] = $rank;
                $smallLabelSummary[$smallLabelId][$userId]['user_id'] = $userId;
                $smallLabelSummary[$smallLabelId][$userId]['user_name'] = $users[$userId];
                $smallLabelSummary[$smallLabelId][$userId]['small_label_id'] = $smallLabelId;
                $smallLabelSummary[$smallLabelId][$userId]['small_label'] = $smallLabels[$smallLabelId];
                $rank++;
            }
        }

        // 最新のレコードを取得
        $latestRank = Rank::orderBy('time', 'desc')->first();

        // 最新のレコードのtimeカラムの値を取得し、存在しない場合は1を設定
        $newTime = $latestRank ? $latestRank->time + 1 : 1;

        // smallLabelSummaryをranksテーブルに新しいレコードとして保存
        foreach ($smallLabelSummary as $smallLabelId => $userResults) {
            foreach ($userResults as $userId => $data) {
                Rank::create([
                    'small_label_id' => $smallLabelId,
                    'small_label' => $data['small_label'],
                    'rank' => $data['rank'],
                    'user_id' => $userId,
                    'name' => $data['user_name'],
                    'accuracy' => $data['accuracy'],
                    'correct' => $data['correct'],
                    'incorrect' => $data['incorrect'],
                    'total' => $data['total'],
                    'average_time' => $data['average_time'],
                    'time' => $newTime // 全体のループで同じtimeを設定
                ]);
            }
        }

        // 点数の計算ロジック
        $rankPoints = [
            1 => 6,
            2 => 4,
            3 => 3,
            4 => 2,
            5 => 1,
        ];

        // 最新のtimeカラムの値を取得
        $latestTime = Rank::max('time');

        // 最新のtimeカラムに基づいてレコードを取得
        $latestRanks = Rank::where('time', $latestTime)->get();

        // 最新のtimeカラムの前の値を取得
        $previousTime = Rank::where('time', '<', $latestTime)->max('time');

        // 前回のtimeカラムに基づいてレコードを取得
        $previousRanks = Rank::where('time', $previousTime)->get();

        // 点数を集計する関数
        function calculateScores($ranks, $rankPoints) {
            $userScores = [];
            foreach ($ranks as $rank) {
                $userId = $rank->user_id;
                $rankValue = $rank->rank;

                // 点数計算
                $points = $rankPoints[$rankValue] ?? 0;

                // ユーザーの点数を集計
                if (!isset($userScores[$userId])) {
                    $userScores[$userId] = 0;
                }
                $userScores[$userId] += $points;
            }
            return $userScores;
        }

        // 直近の保存分の点数を計算
        $latestUserScores = calculateScores($latestRanks, $rankPoints);

        // その前の保存分の点数を計算
        $previousUserScores = calculateScores($previousRanks, $rankPoints);

        // 点数の多い順に並べ替え
        arsort($latestUserScores);
        arsort($previousUserScores);

        // 各ユーザーのジャンルごとの平均順位を計算する関数
        function calculateAverageRanks($ranks) {
            $userRanks = [];

            // 各ユーザーの各ジャンルにおける順位を集計
            foreach ($ranks as $rank) {
                $userId = $rank->user_id;
                $smallLabelId = $rank->small_label_id;

                if (!isset($userRanks[$userId])) {
                    $userRanks[$userId] = [];
                }
                if (!isset($userRanks[$userId][$smallLabelId])) {
                    $userRanks[$userId][$smallLabelId] = [];
                }

                $userRanks[$userId][$smallLabelId][] = $rank->rank;
            }

            // 各ユーザーの平均順位を計算
            $userAverageRanks = [];
            foreach ($userRanks as $userId => $labels) {
                $totalRanks = 0;
                $totalCount = 0;
                foreach ($labels as $smallLabelId => $ranks) {
                    $totalRanks += array_sum($ranks);
                    $totalCount += count($ranks);
                }
                $averageRank = $totalCount > 0 ? $totalRanks / $totalCount : 0;
                $userAverageRanks[$userId] = number_format($averageRank, 2);
            }

            return $userAverageRanks;
        }

        // 直近の保存分の平均順位を計算
        $latestUserAverageRanks = calculateAverageRanks($latestRanks);

        // その前の保存分の平均順位を計算
        $previousUserAverageRanks = calculateAverageRanks($previousRanks);

        // ユーザー情報を取得し、名前、点数、平均順位を含める関数
        function getUserNamesWithScoresAndRanks($userScores, $userAverageRanks) {
            return User::whereIn('id', array_keys($userScores))->get()->mapWithKeys(function ($user) use ($userScores, $userAverageRanks) {
                return [$user->id => [
                    'name' => $user->name, 
                    'score' => $userScores[$user->id], 
                    'average_rank' => $userAverageRanks[$user->id] ?? null
                ]];
            })->sortByDesc('score');
        }

        // 直近の保存分のユーザー情報と点数、平均順位を取得
        $latestUserNames = getUserNamesWithScoresAndRanks($latestUserScores, $latestUserAverageRanks);

        // その前の保存分のユーザー情報と点数、平均順位を取得
        $previousUserNames = getUserNamesWithScoresAndRanks($previousUserScores, $previousUserAverageRanks);

        // ChatWork APIクライアントの作成
        $client = new Client([
            'headers' => [
                'X-ChatWorkToken' => 'f7f4028e3bfd055ef99673db753c6102' // トークン
            ]
        ]);

        // 通知メッセージの作成
        $message = "[info](ec14)三択ｱﾌﾟﾘ獲得ｽﾀｰ週間結果\nhttp://43.206.122.93/login [hr]\n　獲得/ｼﾞｬﾝﾙ平均/(前回記録)\n";

        foreach ($latestUserNames as $key => $user) {
            $rank = array_search($key, array_keys($latestUserNames->toArray())) + 1; // 順位を計算
            $message .= "{$rank}位⭐️{$user['score']}個/{$user['average_rank']}位/{$user['name']}さん\n";
        }
        $message .= "[/info]";


        // ChatWork Room IDを持つユーザーに対してメッセージを送信
        foreach ($latestUserNames as $key => $user) {
            $chatworkRoomId = User::find($key)->chatwork_room_id;

            if (!$chatworkRoomId) {
                continue;
            }
            
            // メッセージ送信の処理
            $client->post("https://api.chatwork.com/v2/rooms/{$chatworkRoomId}/messages", [
                'form_params' => [
                    'body' => $message
                ]
            ]);        
        }

        dd($users);

        return view('santaku.master')
            ->with('selectList', $selectList)
            ->with('largelabelList', $largelabelList)
            ->with('middlelabelList', $middlelabelList)
            ->with('users', $users)
            ->with('currentUser', $id);
    }
}
