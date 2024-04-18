<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Models\LabelStorages;
use App\Models\LargeLabel;
use App\Models\MiddleLabel;
use App\Models\SmallLabel;
use App\Models\User;
use App\Models\Question;

use GuzzleHttp\Client;


use Illuminate\Http\Request;


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

        //　ログインしたユーザーの選んだジャンルを呼び出し、Eagerロードのためにwith([ミドルラベル、ラージラベル])してdbへのアクセスを少なくする
        $selectList = LabelStorages::where('user_id', $id)->with('smallLabel.middleLabel.largeLabel')->get();

        $smalllabelList = SmallLabel::all();


        // 両方のリストの数を比較
        // $selectListと$smalelabelListの数が異なる、かつ$selectListにない$smalelabelListの要素を追加
        if ($selectList->count() != $smalllabelList->count()) {
            foreach ($smalllabelList as $item) {
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
        $largelabelList = LargeLabel::all();
        $middlelabelList = MiddleLabel::all();


        // 現在認証しているユーザーのIDを取得
        $id = auth()->id();
        // 必要なモデルデータの取得
        $users = User::orderBy('continuous_correct_answers', 'DESC')->get();

        $client = new Client([
            'headers' => [
                'X-ChatWorkToken' => 'f7f4028e3bfd055ef99673db753c6102' // トークン
            ]
        ]);

        $topThreeUsers = User::orderBy('continuous_correct_answers', 'desc')
            ->take(3)
            ->get();

        // chatwork_room_idがnullではないユーザーのみをフィルタリング
        $filteredUsers = $users->whereNotNull('chatwork_room_id');


        // 各フィルタリングされたユーザーをイテレートします
        foreach ($filteredUsers as $index => $user) {
            $count = 0;
            $rank = $index + 1; // 順位を計算

            // 二つのメッセージを組み合わせる
            $message = "[info](ec14)三択アプリ 週間Rank
http://43.206.122.93/login                [hr]
連続正解now : {$user->continuous_correct_answers}問  (Rank:{$rank}位)
自己最高best: {$user->best_record}問  [{$user->best_record_at}]
[/info]";


            $message2 = "TOP3:連続正解数\n";
            foreach ($topThreeUsers as $topUser) {
                $count = $count + 1;
                $message2 .= "{$topUser->continuous_correct_answers}問(Rank:{$count}位)\n";
            }

            $message3 = "[前回ログイン{$user->updated_at->format('Y-m-d H:i')}]";

            $fullMessage = $message . "\n" . $message2 . $message3; // メッセージ部分を組み合わせる

            // ChatWorkに組み合わせたメッセージを送信
            $client->post("https://api.chatwork.com/v2/rooms/{$user->chatwork_room_id}/messages", [
                'form_params' => [
                    'body' => $fullMessage
                ]
            ]);
        }

        return view('santaku.master')
            ->with('selectList', $selectList)
            ->with('largelabelList', $largelabelList)
            ->with('middlelabelList', $middlelabelList)
            ->with('users', $users)
            ->with('currentUser', $id);
    }
}
