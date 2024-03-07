<?php

namespace App\Http\Controllers\Santaku;

use App\Http\Controllers\Controller;
use App\Http\Requests\Santaku\UpdateRequest;
use App\Models\Question;
use App\Services\SantakuService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, SantakuService $santakuService)
    {
        if (!$santakuService->checkOwnMondai(
            $request->user()->id,
            $request->id()
        )) {
            return redirect()
                ->route('list')
                ->with('feedback.success', '他のユーザーの問題は更新出来ません');

            throw new AccessDeniedHttpException();
        }
        // ディレクトリ名
        $dir = 'images';

        // アップロードされたファイル名を取得
        $file_name1 = $request->file('question_image')->getClientOriginalName();
        $file_name2 = $request->file('comment_image')->getClientOriginalName();

        // S3に保存
        $path1 = Storage::disk('s3')->putFile($dir, $request->file('question_image'), $file_name1, 'public');
        $path2 = Storage::disk('s3')->putFile($dir, $request->file('comment_image'), $file_name2, 'public');

        //⭐️登録した問題の全てがquestionに保存されていることを修正必要。dbへ保存する処理を追加する必要あり
        $question = Question::where('id', $request->id())->firstOrFail();
        $question->small_label_id = $request->small_label_id; //数字を入れる場合は、->small_label_id()←カッコは不要。
        $question->question = $request->question();
        $question->question_path = Storage::disk('s3')->url($path1);
        $question->answer = $request->answer();
        $question->comment = $request->comment();
        $question->comment_path = Storage::disk('s3')->url($path2);
        $question->save();

        return redirect()
            ->route('edit', ['questionId' => $question->id])
            ->with('feedback.success', '編集が完了しました');
    }
}
