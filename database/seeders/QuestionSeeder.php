<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::create([
            'user_id' => 1,
            'question' => '1×1=',
            'answer' => '1  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルイチハイチ',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×2=',
            'answer' => '2  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルニハニ',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×3=',
            'answer' => '3  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルサンハサン',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×4=',
            'answer' => '4  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルヨンハヨン',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×5=',
            'answer' => '5  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルゴハゴ',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×6=',
            'answer' => '6  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルロクハロク',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×7=',
            'answer' => '7  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルナナハナナ',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×8=',
            'answer' => '8  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルハチハハチ',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1×9=',
            'answer' => '9  ：掛け算ジャンルのanswer',
            'comment' => 'イチカケルキュウハキュウ',
            'large_label_id' => 4,
            'middle_label_id' => 29,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+1=',
            'answer' => '2  ：足し算ジャンルのanswer',
            'comment' => 'イチタスイチハニ',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+2=',
            'answer' => '3  ：足し算ジャンルのanswer',
            'comment' => 'イチタスニハサン',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+3=',
            'answer' => '4  ：足し算ジャンルのanswer',
            'comment' => 'イチタスサンハヨン',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+4=',
            'answer' => '5  ：足し算ジャンルのanswer',
            'comment' => 'イチタスヨンハゴ',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+5=',
            'answer' => '6  ：足し算ジャンルのanswer',
            'comment' => 'イチタスゴハロク',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+6=',
            'answer' => '7  ：足し算ジャンルのanswer',
            'comment' => 'イチタスロクハナナ',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+7=',
            'answer' => '8  ：足し算ジャンルのanswer',
            'comment' => 'イチタスナナハハチ',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+8=',
            'answer' => '9  ：足し算ジャンルのanswer',
            'comment' => 'イチタスハチハキュウ',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 2,
            'question' => '1+9=',
            'answer' => '10 ：足し算ジャンルのanswer',
            'comment' => 'イチタスキュウハジュウ',
            'large_label_id' => 4,
            'middle_label_id' => 27,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '1-1=',
            'answer' => '0  ：引き算ジャンルのanswer',
            'comment' => 'イチヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '2-1=',
            'answer' => '1  ：引き算ジャンルのanswer',
            'comment' => 'ニヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '3-1=',
            'answer' => '2  ：引き算ジャンルのanswer',
            'comment' => 'サンヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '4-1=',
            'answer' => '3  ：引き算ジャンルのanswer',
            'comment' => 'ヨンヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '5-1=',
            'answer' => '4  ：引き算ジャンルのanswer',
            'comment' => 'ゴヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '6-1=',
            'answer' => '5  ：引き算ジャンルのanswer',
            'comment' => 'ロクヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '7-1=',
            'answer' => '6  ：引き算ジャンルのanswer',
            'comment' => 'ナナヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '8-1=',
            'answer' => '7  ：引き算ジャンルのanswer',
            'comment' => 'ハチヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '9-1=',
            'answer' => '8  ：引き算ジャンルのanswer',
            'comment' => 'キュウウヒクイチハ',
            'large_label_id' => 4,
            'middle_label_id' => 28,
        ]);

        Question::create([
            'user_id' => 1,
            'question' => 'A/G_県税の税率確認資料は',
            'answer' => '必要資料ページのみで良い',
            'comment' => '不要な部分は破棄する',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'A/G_車両計上の5,746,146円が',
            'answer' => '集計額根拠資料を集計しておく',
            'comment' => '詳細記入の購入明細書が添付され、一部を計上しているため何を集計したかが不明だった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'A/G_住民税延滞金3,900円は',
            'answer' => '損金経理した付帯税等の金額',
            'comment' => '付帯税は損金不算入。加算されていなかった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'A/G_固定資産取得資料は',
            'answer' => '消費税科目別と現預金証憑の間',
            'comment' => '現預金の後はBS→PLの順に並べる',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'A/G_別表四に加算した税額控除の所得税は',
            'answer' => '別表五(二)の損金不算入租税公課に記載',
            'comment' => '義務はないが記入し、PL租税公課と合計を一致させる',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);

        Question::create([
            'user_id' => 1,
            'question' => 'D/L_宇美町に出す申告書の宛名',
            'answer' => '宇美町長と記載',
            'comment' => '空白になっていた',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'M/E_決算書の器具備品は',
            'answer' => '固定資産台帳と一致',
            'comment' => '不一致だった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Z/T_税抜経理の場合は',
            'answer' => '注記は税込経理',
            'comment' => '確認もれ',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Z/T_消費税申告書の付記事項は',
            'answer' => '特例なければ無しに〇印つける',
            'comment' => '空白にしない',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Z/T_消費税申告ある税務代理権限では',
            'answer' => '受任税目に消費税つける',
            'comment' => '消費税にチェック必要',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_科目別対前年比は',
            'answer' => '上位5つぐらいは記入',
            'comment' => '義額と粗利率など',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_簡易課税の税抜経理だけど',
            'answer' => '課税仕入れはキチンと入力',
            'comment' => '精算差額や資産計上額が変わるので正確に',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_消費税精算差額の経費差額は',
            'answer' => '租税公課勘定',
            'comment' => '統一する',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_消費税精算差額の収入は',
            'answer' => '雑収入勘定',
            'comment' => '統一する',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_補助残高を利用しているなら',
            'answer' => '補助残高一覧を決算資料の最後に添付',
            'comment' => 'freeeの品目は多すぎにつき不要',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_一株当たり情報は',
            'answer' => '記載不要',
            'comment' => '統一する',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_遠賀信金の科目明細の名称は',
            'answer' => '遠賀信用金庫',
            'comment' => '正式名称が原則',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_西日本シティ借入金2口は',
            'answer' => '分けて記載する',
            'comment' => '合算しない',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_役員給料等の科目内訳明細は',
            'answer' => '家族分の金額は記載',
            'comment' => 'あるのに空白だった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_内訳書の取引内容に職業安定局のみ',
            'answer' => '名称欄に職業安定局で取引内容は助成金名',
            'comment' => '名称が職業安定局で内容が助成金',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_雑収入の国税還付金は',
            'answer' => '内容は源泉所得税還付金',
            'comment' => '国税還付金だと、何の還付金か判断つかない',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_減価償却資料の最後に',
            'answer' => '10年間シミュを入れる',
            'comment' => '今期末から10年間でよく、翌年度更新は法人のみ',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_リース資産はリースアップや経費処理のため',
            'answer' => '契約書確認する',
            'comment' => '契約書未確認で口頭確認のみしていた',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_受取配当金があれば',
            'answer' => '別表八の作成必要',
            'comment' => '作成がなかった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_控除対象外消費税の計算は',
            'answer' => '別紙に対象外結果を記載する',
            'comment' => '申告書に直に手書きしていた',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_交際費の決算書の金額は',
            'answer' => '別表15の金額と一致する',
            'comment' => '金額が不一致だった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_法人市民税の古賀市への申告書提出先は',
            'answer' => '古賀市長',
            'comment' => '古賀市のみだった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_概況書の役員報酬額異動無しは',
            'answer' => '異動無に〇をつける',
            'comment' => '〇がついてなかった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_決算資料の並びは',
            'answer' => 'BS→PLの順',
            'comment' => '敷金が最前面にきていた',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_借入保証料の計算は',
            'answer' => '計算書類にして根拠書類を添付',
            'comment' => '添付が何もなかった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_内訳書と決算資料は',
            'answer' => '数字がチェック出来るようにする',
            'comment' => 'チェックがしずらい整理状況だった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_従業員との駐車場賃貸借は',
            'answer' => '賃貸借契約書を結ぶ',
            'comment' => '期中に案内されておらず取得が遅い',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_簡易課税で租税公課に課税仕入れ',
            'answer' => '租税公課に課税仕入れはない',
            'comment' => '課税仕入れ処理されていた',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_2022年3月期の関与先フォルダの名前は',
            'answer' => '202203',
            'comment' => '202109になっていた',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_第8期の決算書には',
            'answer' => '表紙にも8期を表記',
            'comment' => '期がわからないのは不便',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_税抜経理方式の場合は',
            'answer' => '注記に税抜経理方式',
            'comment' => '経理方式が記載なし',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_家具分割支払いは',
            'answer' => '分割払いの予定表必要',
            'comment' => '添付がなかった',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_車両を購入した場合は',
            'answer' => '購入明細が必要',
            'comment' => '書類依頼が遅い',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_H27年取得が廃棄されているかは',
            'answer' => '期末近辺に確認',
            'comment' => '期末近辺に確認',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_認定利息計上時は',
            'answer' => '貸付の根拠資料を入れる',
            'comment' => '期中の増減をみるため毎月末残高を記載する',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'W/A_繰延消費税は',
            'answer' => '償却イメージをエクセル作成',
            'comment' => '何もなかったため',
            'large_label_id' => 1,
            'middle_label_id' => 6,
        ]);

//3-23_laravel
        Question::create([
            'user_id' => 1,
            'question' => 'Webサイトに埋め込まれたJavaScriptコードにより、Cookieなどから情報を抜き出す等の微弱性',
            'answer' => 'XSS',
            'comment' => 'クロスサイトスクリプティング',
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '他者になりすましてリクエストや偽のWebサイトからのリクエストを許容させる微弱性',
            'answer' => 'CSRF',
            'comment' => 'クロスサイトリクエストフォージェリ',
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'アプリケーションが想定しないSQLを実行させられる微弱性',
            'answer' => 'SQLインクジェクション',
            'comment' => '',
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'ArtisanコマンドでMySQLにログインする',
            'answer' => 'sail mysql',
            'comment' => '終了する時は、exit',
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'PHPのマジックメソッドで1つのコントローラーに1つのメソッドしかルーティングできない',
            'answer' => '--invokable',
            'comment' => 'sail artisan make:controller ⚫️⚫️Controller --invokable',
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '動的なHTMLを作成することができるテンプレートエンジン',
            'answer' => 'Blade',
            'comment' => '動的な変数は{{ $name }}を挟むことで出力できる',
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Laravelのヘルパー関数、view()の第1引数は',
            'answer' => 'resources/viewsのファイル名',
            'comment' => "view('tweet.index', ['name' => 'laravel']); 第1引数→tweet/indexという階層の場合、「.」で区切るとディレクトリと対応してbladeファイルが適用される。第2引数は、name変数に「laravel」という文字列を渡している。users=['name'=>'laravel','mail'=>'user@gmail.com']の変数でも可能。",
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Laravelのヘルパー関数、view()の第2引数は',
            'answer' => "テンプレートで利用するデータ名",
            'comment' => "view('tweet.index', ['name' => 'laravel']); 第2引数は、name変数に「laravel」という文字列を渡している。\$users=['name'=>'laravel','mail'=>'user@gmail.com']の変数でも可能。第1引数→tweet/indexという階層の場合、「.」で区切るとディレクトリと対応してbladeファイルが適用される",
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Laravelのヘルパー関数、view()に変数を渡す方法のwith関数の第1引数は',
            'answer' => "変数名",
            'comment' => "view('tweet.index')->with('name','laravel')->with('version','8');  with関数は、メソッドチェーンで何度も呼び出し可能",
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'Laravelのヘルパー関数、view()に変数を渡す方法のwith関数の第2引数は',
            'answer' => "変数の値",
            'comment' => "view('tweet.index')->with('name','laravel')->with('version','8');  with関数は、メソッドチェーンで何度も呼び出し可能",
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '「\」バックスラッシュのmacでの入力方法',
            'answer' => "[option]+[¥]",
            'comment' => "Windowsの日本語キーボードでは、右上に「￥」のキーがあります。しかし、実際に入力されている文字は、バックスラッシュ（\\）となっています。Mac の場合は、分けて入力することができ、option + ￥ でバックスラッシュの入力が可能",
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => '文字列をシングルクオーテーション(\')で囲ったときに、エスケープシーケンスとして「\」バックスラッシュを利用できるもの',
            'answer' => "「'」「\」",
            'comment' => "文字列をダブルクオーテーション(\")で囲ったときに、エスケープシーケンスを利用できる方が多い。バックスラッシュ(\\),ドル記号(\$),ダブルクオーテーション(\")",
            'large_label_id' => 3,
            'middle_label_id' => 23,
        ]);

//3-26_VScode

        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの単語単位でのカーソル移動',
            'answer' => "option + ← or →",
            'comment' => "",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの行頭、行末のカーソル移動',
            'answer' => "command + ← or →",
            'comment' => "",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの単語単位での範囲選択',
            'answer' => "option + shift + ← or →",
            'comment' => "",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの現在のカーソル位置か行頭 or 行末までの範囲選択',
            'answer' => "command + shift + ← or →",
            'comment' => "",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの上下の行の入れ替え',
            'answer' => "option + ↑ or ↓",
            'comment' => "",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeのファイルの先頭と最後の移動',
            'answer' => "command + ↑ or ↓",
            'comment' => "",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの任意の箇所をマルチカーソル',
            'answer' => "option + クリック",
            'comment' => "複数箇所を同時に編集可能",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeのファイル内検索を利用したマルチカーソル',
            'answer' => "ファイル内検索( command + F ) → option + Enter",
            'comment' => "検索結果全体にマルチカーソルが適用され、一度に修正が可能。",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);
        Question::create([
            'user_id' => 1,
            'question' => 'VScodeの列単位でカーソルを複製する',
            'answer' => "command + option + ↑ or ↓",
            'comment' => "縦ラインまとめて操作に便利",
            'large_label_id' => 3,
            'middle_label_id' => 26,
        ]);



    }

}