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

        // 最新のレコードを取得
        $latestRank = Rank::orderBy('time', 'desc')->first(['*', 'created_at']);
dump($latestRank);
        $newTime = $latestRank ? $latestRank->time + 1 : 1;
dump($newTime);
        // $newTimeが1(新規登録)ならAnswerResults::all()を走らせる
        if ($newTime == 1) {
            $latestAnswerResults = AnswerResults::all();
        }
        // $newTimeが1(新規登録)以外なら前回と今回の間のAnswerResultsを集計する
        else {
            $latestAnswerResults = AnswerResults::where('created_at', '>', $latestRank->created_at)->get();
        }
dump($latestAnswerResults);

        // ユーザーごとにデータをフラット化して処理
        $results = $latestAnswerResults->groupBy('user_id')->map(function ($userResults) {
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
dump($results);
        // ユーザーごとに small_label_id 毎の集計を行う
        $summary = $results->map(function ($userResults) {
            return $userResults->groupBy('small_label_id')->map(function ($group) {
                $totalCorrect = $group->where('is_correct', true)->count();
                $totalQuestions = $group->count();
                $totalTimeDiff = $group->sum('time_diff');
                $averageTime = $totalQuestions > 0 ? $totalTimeDiff / $totalQuestions : 0;
                $accuracy = $totalQuestions > 0 ? $totalCorrect / $totalQuestions * 100 : 0;

                // 条件に合わない場合は null を返す
                if ($totalQuestions <= 10) { // 条件を10問以上に変更
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
dump($summary);
        // small_label_id の昇順に並べ替え
        $sortedSummary = $summary->map(function ($userSummary) {
            return $userSummary->sortKeys();
        });
dump($sortedSummary);
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
        function sortResults($results)
        {
            uasort($results, function ($a, $b) {
                if ($a['accuracy'] == $b['accuracy']) {
                    return $a['average_time'] <=> $b['average_time'];
                }
                return $b['accuracy'] <=> $a['accuracy'];
            });
            return $results;
        }
dump($smallLabelSummary);
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
dump($smallLabelSummary);
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
dump($latestTime);
        // 最新のtimeカラムに基づいてレコードを取得
        $latestRanks = Rank::where('time', $latestTime)->get();


dump($latestRanks);
// ユーザー別にsmall_label_idの数を集計する
$userSmallLabelCounts = $latestRanks->groupBy('user_id')->map(function ($ranks) {
    return $ranks->pluck('small_label_id')->unique()->count();
});
dump($userSmallLabelCounts);
// 最新のtimeカラムの前の値を取得
        $previousTime = Rank::where('time', '<', $latestTime)->max('time');
dump($previousTime);
        // 前回のtimeカラムに基づいてレコードを取得
        $previousRanks = Rank::where('time', $previousTime)->get();
dump($previousRanks);
// ユーザー別にsmall_label_idの数を集計する
$previousUserSmallLabelCounts = $previousRanks->groupBy('user_id')->map(function ($ranks) {
    return $ranks->pluck('small_label_id')->unique()->count();
});
dump($previousUserSmallLabelCounts);

        // 点数を集計する関数
        function calculateScores($ranks, $rankPoints)
        {
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

dump($latestUserScores);
dump($previousUserScores);

function calculateAverageRanks($ranks)
{
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

    // 各ユーザーの平均順位を計算し、ジャンル数も追加
    $userAverageRanks = [];
    foreach ($userRanks as $userId => $labels) {
        $totalRanks = 0;
        $totalCount = 0;
        $labelCount = count($labels); // ジャンル数を計算

        foreach ($labels as $smallLabelId => $ranks) {
            $totalRanks += array_sum($ranks);
            $totalCount += count($ranks);
        }

        $averageRank = $totalCount > 0 ? $totalRanks / $totalCount : 0;
        $userAverageRanks[$userId] = [
            'average_rank' => number_format($averageRank, 2),
            'label_count' => $labelCount // ジャンル数を追加
        ];
    }

    return $userAverageRanks;
}



        // 直近の保存分の平均順位を計算
        $latestUserAverageRanks = calculateAverageRanks($latestRanks);
dump($latestUserAverageRanks);
        // その前の保存分の平均順位を計算
        $previousUserAverageRanks = calculateAverageRanks($previousRanks);
dump($previousUserAverageRanks);

// ユーザー情報を点数と平均順位、ジャンル数を含めて取得する関数
function getUserNamesWithScoresAndRanksAndLabels($userScores, $latestUserAverageRanks, $previousUserAverageRanks)
{
    // ユーザーIDに基づいてユーザー情報を取得し、点数、平均順位、ジャンル数を追加
    return User::whereIn('id', array_keys($userScores))->get()->mapWithKeys(function ($user) use ($userScores, $latestUserAverageRanks, $previousUserAverageRanks) {
        // 直近のジャンル数
        $latestLabelCount = isset($latestUserAverageRanks[$user->id]['label_count']) ? $latestUserAverageRanks[$user->id]['label_count'] : 0;
        // 直近の1つ前のジャンル数
        $previousLabelCount = isset($previousUserAverageRanks[$user->id]['label_count']) ? $previousUserAverageRanks[$user->id]['label_count'] : 0;

        return [$user->id => [
            'name' => $user->name,
            'score' => $userScores[$user->id],
            'average_rank' => $latestUserAverageRanks[$user->id]['average_rank'] ?? null,
            'label_count' => $latestLabelCount, // 直近のジャンル数を追加
            'previous_label_count' => $previousLabelCount // 直近の1つ前のジャンル数を追加
        ]];
    // 点数の多い順に並べ替える
    })->sortByDesc('score');
}

// 直近の保存分のユーザー情報と点数、平均順位、ジャンル数を取得
$latestUserNames = getUserNamesWithScoresAndRanksAndLabels($latestUserScores, $latestUserAverageRanks, $previousUserAverageRanks);
dump($latestUserNames);
// 順位を含めたデータを作成
$rankedLatestUserNames = $latestUserNames->map(function ($user, $userId) use ($latestUserNames) {
    // 現在の順位を計算
    $rank = array_search($userId, array_keys($latestUserNames->toArray())) + 1;
    $user['rank'] = $rank;
    return $user;
});
dump($rankedLatestUserNames);
// その前の保存分のユーザー情報と点数、平均順位、ジャンル数を取得
$previousUserNames = getUserNamesWithScoresAndRanksAndLabels($previousUserScores, $previousUserAverageRanks, []);
dump($previousUserNames);
// 順位を含めたデータを作成
$rankedPreviousUserNames = $previousUserNames->map(function ($user, $userId) use ($previousUserNames) {
    // 現在の順位を計算
    $rank = array_search($userId, array_keys($previousUserNames->toArray())) + 1;
    $user['rank'] = $rank;
    return $user;
});
dump($rankedPreviousUserNames);

// 共通するユーザーがいる場合は $rankedPreviousUserNames の情報を $rankedLatestUserNames に含める
$rankedLatestUserNames = $rankedLatestUserNames->map(function ($user, $userId) use ($rankedPreviousUserNames) {
    // $rankedPreviousUserNames に共通するユーザーがいる場合
    if (isset($rankedPreviousUserNames[$userId])) {
        $user['previous_score'] = $rankedPreviousUserNames[$userId]['score'];
        $user['previous_average_rank'] = $rankedPreviousUserNames[$userId]['average_rank'];
        $user['previous_rank'] = $rankedPreviousUserNames[$userId]['rank'];
        $user['previous_label_count'] = $rankedPreviousUserNames[$userId]['label_count']; // 前回のジャンル数を追加
    } else {
        // 共通するユーザーがいない場合
        $user['previous_score'] = null;
        $user['previous_average_rank'] = null;
        $user['previous_rank'] = null;
        $user['previous_label_count'] = null; // 前回のジャンル数がない場合
    }
    return $user;
});

dump($rankedLatestUserNames);

        // ChatWork APIクライアントの作成
        $client = new Client([
            'headers' => [
                'X-ChatWorkToken' => 'f7f4028e3bfd055ef99673db753c6102' // トークン
            ]
        ]);

// 各ユーザーに個別の順位情報を含むメッセージを作成
foreach ($rankedLatestUserNames as $userId => $user) {
    $messageBody = "[info]{$user['name']}さん三択アプリ 今週ランキング\n";
    $messageBody .= "http://43.206.122.93/login\n";
    $messageBody .= "⭐️はｼﾞｬﾝﾙ毎正解率。同率は速さ優劣\n1位6個 2〜5位4.3.2.1個 ⭐️獲得戦[hr]\n";

    $messageBody .= "▶︎順位⭐️獲得/ジャンル数と平均順位\n";

    foreach ($rankedLatestUserNames as $key => $user) {
        // 現在の順位を計算
        $rank = array_search($key, array_keys($rankedLatestUserNames->toArray())) + 1;
    
        // 前回の順位を取得
        $previousRank = $rankedPreviousUserNames[$key]['rank'] ?? 'ランク外';

        // 通知されるユーザーと同じかをチェックして強調表示
        if ($key == $userId) {
            $messageBody .= "{$rank}位⭐️{$user['score']}個 {$user['label_count']}つ平均{$user['average_rank']}位 (dance) {$user['name']}さん\n";
        } else {
            $messageBody .= "{$rank}位⭐️{$user['score']}個 {$user['label_count']}つ平均{$user['average_rank']}位\n";
        }
    }
    $messageBody .= "\n[hr]▶︎あなたの順位別一覧 10問以上条件\n";

        // 各ユーザーのトップラベルを取得
        $topSmallLabels = Rank::where('time', $latestTime)
            ->where('user_id', $userId)
            ->where('rank', '<=', 5)
            ->orderBy('rank', 'asc') // 1位から表示するように昇順で並び替える
            ->get(['small_label_id', 'small_label', 'rank'])
            ->toArray();
        
        // 各ランクの small_label を集計
        $rankLabels = [];
        foreach ($topSmallLabels as $label) {
            $rank = $label['rank'];
            if (!isset($rankLabels[$rank])) {
                $rankLabels[$rank] = [];
            }
            $rankLabels[$rank][] = $label['small_label'];
        }
        
        // 各ランクの small_label を横並びで表示
        foreach ($rankLabels as $rank => $labels) {
            $messageBody .= "{$rank}位: " . implode('.', $labels);
        }
        

    
    $messageBodya = "先週ランキング(参考)\n";

    foreach ($rankedLatestUserNames as $key => $user) {
        // 現在の順位を計算
        $rank = array_search($key, array_keys($rankedLatestUserNames->toArray())) + 1;
    
        // 前回の順位を取得
        $previousRank = $rankedPreviousUserNames[$key]['rank'] ?? 'ランク外';

        // 通知されるユーザーと同じかをチェックして強調表示
        if ($key == $userId) {
            $messageBodya .= "{$previousRank}位⭐️{$user['previous_score']}個  {$user['previous_label_count']}つ平均{$user['previous_average_rank']}位\n";
        } else {
            $messageBodya .= "{$previousRank}位⭐️{$user['previous_score']}個  {$user['previous_label_count']}つ平均{$user['previous_average_rank']}位\n";
        }


    }

    $messageBody .= "[/info]\n";

    // 個別のユーザー情報を追加
    $individualRank = array_search($userId, array_keys($rankedLatestUserNames->toArray())) + 1;
    $individualPreviousRank = $rankedPreviousUserNames[$userId]['rank'] ?? 'ランク外';



    // 全体メッセージと個別メッセージを結合
    $messageBody .= $messageBodya;

    // 各ユーザーごとにメッセージを送信
    $chatworkRoomId = User::find($userId)->chatwork_room_id;

    if (!$chatworkRoomId) {
        // ChatWork Room IDが見つからない場合の警告を出力
        echo "Warning: ChatWork Room ID is missing for user ID: {$userId}\n";
    } else {
        // ChatWork APIを使用してメッセージを送信
        $client->post("https://api.chatwork.com/v2/rooms/{$chatworkRoomId}/messages", [
            'form_params' => [
                'body' => $messageBody
            ]
        ]);
    }
}
ddd($user);
        return view('santaku.master')
            ->with('selectList', $selectList)
            ->with('largelabelList', $largelabelList)
            ->with('middlelabelList', $middlelabelList)
            ->with('users', $users)
            ->with('currentUser', $id);
    }
}
