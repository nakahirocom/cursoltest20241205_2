<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LabelStorages;
use App\Models\LargeLabel;


class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';


    /**
     * 答えが被らない問題を3つ返却する
     *
     * @return array
     */

/*    public static function getThreeQuestionsAtRandom(): array
    {

        $id = auth()->id();

        $q1 = Question::
            //ユーザーが選んでいるジャンルの内、（LabelStoragesのselectカラムが１）をwhereinの検索条件にinRandomOrder()しfirst()で１つ取得する。
            wherein('middle_label_id', LabelStorages::where('user_id', $id)->where('selected', 1)->select('middle_label_id'))
            ->with('middlelabel')
            ->inRandomOrder()
            ->first();

        if ($q1 === null) {
            // $q1[0]にnullを入れてリターンでgetThreeQuestionsAtRandom()の戻り値を返す
            return [$q1];
        }

        $q2 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNot('answer', $q1?->answer)->inRandomOrder()->first();

        $q3 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1,$q2のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNotIn('answer', [$q1?->answer, $q2?->answer])->inRandomOrder()->first();


        return [$q1, $q2, $q3];

    
    }
*/

    //間違いの多い問題を抽出する
    public static function getThreeQuestionsAtRandom(): array
    {
        //ユーザーの選択た中分類の内、question_id 毎に'question_id'の数を数えて出題数をカウントする。
        $questions_allsyutudaisuu = AnswerResults::select('question_id')
            ->selectRaw('COUNT(question_id) as syutudaisuu')
            //⭐️ユーザーが選択したものも条件に追加する必要がある。
            ->where('user_id', auth()->id())
            ->groupBy('question_id')
            ->orderBy('question_id', 'asc')
            ->get();

        //新規ユーザーで問題を１問も解いていない場合、空のコレクションになる。isEmptyで空なのか判定し、true(空)ならインデックス画面に戻してあげる。
        if ($questions_allsyutudaisuu->isEmpty()) {
            //$q1[0]にnullを入れてリターンでgetMissThreeQuestionsAt()の戻り値を返す
            return [$q1 = null];
        }

        //ユーザーの選択した中分類の内、question_id 毎に'question_id'と'answered_question_id'が一致するものをカウントする。
        $questions_seikaisuu = AnswerResults::select('question_id')
            ->selectRaw('COUNT(question_id) as seikaisuu')
            //⭐️ユーザーが選択したものも条件に追加する必要がある。
            ->where('user_id', auth()->id())
            ->whereColumn('question_id', 'answered_question_id')
            ->groupBy('question_id')
            ->orderBy('question_id', 'asc')
            ->get();

        //foreachで出題数コレクションを回す。
        foreach ($questions_allsyutudaisuu as $key => $value) {
            //正解数コレクションに同じ出題数[$key]に対応するquestion_idが存在するか判定する。
            $contains = $questions_seikaisuu->contains('question_id', $questions_allsyutudaisuu[$key]->question_id);

            if ($contains) {
                //ture（question_idが双方にある）なら出題数のquestion_idと一致する正解数のqustion_idを配列で取得する。
                $ittiseikaisuu = $questions_seikaisuu->firstwhere('question_id', $questions_allsyutudaisuu[$key]->question_id)->toArray();
                //連想配列の$ittiseikaisuuに$questions_allsyutudaisuuから一致する出題数を追加する。
                $ittiseikaisuu = array_merge($ittiseikaisuu, array('syutudaisuu' => $questions_allsyutudaisuu[$key]->syutudaisuu));
                //連想配列の$ittiseikaisuuに分子と分母が揃ったので正解率を計算し連想配列に追加する。
                $kobetuseikairitu = array_merge($ittiseikaisuu, array('seikairitu' => $ittiseikaisuu['seikaisuu'] / $ittiseikaisuu['syutudaisuu']));
                //個別の情報を新たな配列に集める。
                $seikairituArray[$key] = $kobetuseikairitu;
            } else {
                //false（question_idが正解数にない＝正解が1つもない）なら[$key]に対応する要素の出題数を配列に入れる。
                $huittiseikaisuu = $questions_allsyutudaisuu[$key]->toArray();
                //連想配列の$huittiseikaisuuに'seikairitu'０の連想配列を$huittiseikaisuuに追加する。
                $huittiseikaisuu = array_merge($huittiseikaisuu, array('seikaisuu' => 0));
                //連想配列の$huittiseikaisuuに分子と分母が揃ったので正解率を計算し連想配列に追加する。
                $kobetuseikairitu = array_merge($huittiseikaisuu, array('seikairitu' => $huittiseikaisuu['seikaisuu'] / $huittiseikaisuu['syutudaisuu']));
                //個別の情報を新たに作成した配列に追加する。
                $seikairituArray[$key] = $kobetuseikairitu;
            }
        };
        //連想配列をコレクションに戻す
        $syuukei = collect($seikairituArray);
        //コレクションメソッドから正解率ワースト１を抽出する
        $Worstseikairitu = $syuukei->sortBy('seikairitu')->first();

        $q1 = Question::
            //ユーザーが選んでいるジャンルの内、（LabelStoragesのselectカラムが１）をwhereinの検索条件にinRandomOrder()しfirst()で１つ取得する。
            where('id', $Worstseikairitu['question_id'])
            //正解率が一番低いものを１つ取得する
            ->first();

        $q2 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNot('answer', $q1?->answer)->inRandomOrder()->first();

        $q3 = Question::
            //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1,$q2のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNotIn('answer', [$q1?->answer, $q2?->answer])->inRandomOrder()->first();

        $q4 = Question::
             //$q1でランダムで選択されたジャンルと同じジャンルをwhereで範囲指定し、$q1,$q2,$q3のanswerと答えが被らないものをランダムに１つ取得する。
            where('middle_label_id', ($q1->middle_label_id))
            ->whereNotIn('answer', [$q1?->answer, $q2?->answer, $q3?->answer])->inRandomOrder()->first();

        return [$q1, $q2, $q3, $q4];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function largelabel()
    {
        return $this->belongsTo(LargeLabel::class);
    }

    public function middlelabel()
    {
        return $this->belongsTo(MiddleLabel::class);
    }


}
