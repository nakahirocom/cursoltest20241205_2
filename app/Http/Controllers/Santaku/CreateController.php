<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\CreateRequest;
use App\Models\Question;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        // ディレクトリ名
        $dir = 'images';

        // データベースへの保存
        $question = new Question;
        $question->user_id = $request->userId();
        $question->small_label_id = $request->small_label_id;
        $question->question = $request->question();
        $question->answer = $request->answer();
        $question->comment = $request->comment();
        $question->reference_url = $request->reference_url();

        // 質問画像がある場合、S3に保存。そうでない場合、デフォルト値を設定。
        if ($request->hasFile('question_image')) {
            $file_name1 = $request->file('question_image')->getClientOriginalName();
            $path1 = Storage::disk('s3')->putFile($dir, $request->file('question_image'));
            $question->question_path = Storage::disk('s3')->url($path1);
        } else {
            // デフォルトの画像パス
            $question->question_path = null;
        }

        // コメント画像がある場合、S3に保存。そうでない場合、デフォルト値を設定。
        if ($request->hasFile('comment_image')) {
            $file_name2 = $request->file('comment_image')->getClientOriginalName();
            $path2 = Storage::disk('s3')->putFile($dir, $request->file('comment_image'));
            $question->comment_path = Storage::disk('s3')->url($path2);
        } else {
            // デフォルトの画像パス
            $question->comment_path = null;
        }

        $question->save();

        // 登録したばかりのQuestionのIDを取得
        $questionId = $question->id;
        //dump($questionId);
        return redirect()
            ->route('edit', ['questionId' => $questionId])
            ->with('feedback.success', '新規登録が完了しました');
    }
}
