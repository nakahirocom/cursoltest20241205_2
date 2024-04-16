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
        dump($smalllabelList);

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


        $users = User::orderBy('continuous_correct_answers', 'DESC')->get();


// インスタンス生成
$client = new Client();

// 取得したAPIトークン
$token   = "f7f4028e3bfd055ef99673db753c6102";
// 取得したルームID
$room_id = "89382092";
// webhookURL
$url     = "https://api.chatwork.com/v2/rooms/{$room_id}/messages";
// 通知内容を設定する
$body    = "[info]三択アプリからchatworkへ通知[/info]
url  http://43.206.122.93/login";


$client->post($url, [
    'headers'     => ['X-ChatWorkToken' => $token],
    'form_params' => ['body' => $body]
]);

        dump($selectList);
        return view('santaku.master')
            ->with('selectList', $selectList)
            ->with('largelabelList', $largelabelList)
            ->with('middlelabelList', $middlelabelList)
            ->with('users', $users)
            ->with('currentUser', $id);
    }
}
