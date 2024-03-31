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

        // 現在のユーザーが指定されたIDのmondaiを所有しているかチェック
        if (!$santakuService->checkOwnMondai(
            $request->user()->id,
            $request->id()
        )) {
            return redirect()
                ->route('list')
                ->with('feedback.success', '他のユーザーの問題は更新できません');
            throw new AccessDeniedHttpException();
        }

        // ディレクトリ名
        $dir = 'images';


        // データベースから質問を取得し、更新する
        $question = Question::where('id', $request->id())->firstOrFail();
        $question->small_label_id = $request->small_label_id;
        $question->question = $request->question();
        $question->answer = $request->answer();
        $question->comment = $request->comment();


        // 質問画像がある場合、S3に保存
        if ($request->hasFile('question_image')) {
            $file_name1 = $request->file('question_image')->getClientOriginalName();
            $path1 = Storage::disk('s3')->putFile($dir, $request->file('question_image'));
            $question->question_path = Storage::disk('s3')->url($path1);
        }

        // コメント画像がある場合、S3に保存
        if ($request->hasFile('comment_image')) {
            $file_name2 = $request->file('comment_image')->getClientOriginalName();
            $path2 = Storage::disk('s3')->putFile($dir, $request->file('comment_image'));
            $question->comment_path = Storage::disk('s3')->url($path2);
        }

        $question->save();

        return redirect()
            ->route('edit', ['questionId' => $question->id])
            ->with('feedback.success', '更新が完了しました');
    }
}
