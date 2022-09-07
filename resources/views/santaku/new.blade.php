<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>santakuアプリ</title>
</head>

<a class="btn" href="/">index画面へ戻る</a></p>
<p>-----------------------------------------------------------------------------------------</p>
<h2>三択アプリ　問題作成画面</h2>
<p>-----------------------------------------------------------------------------------------</p>
<form method="post" action="{{ route('create.index') }}">■問題と回答・解説を登録してください
  @csrf
  <br />
  <span>問題:</span>
  <br />
  <input type="text" name="question" />
  @error('question')
  <p style="coler: red;">{{ $message }}</p>
  @enderror
  <br />
  <span>答え:</span>
  <br />
  <input type="text" name="answer" />
  @error('answer')
  <p style="coler: red;">{{ $message }}</p>
  @enderror
  <br />
  <span>解説:</span>
  <br />
  <input type="text" name="comment" />
  <br />
  @error('comment')
  <p style="coler: red;">{{ $message }}</p>
  @enderror
  <br />
  <span>ジャンル:</span>
  <br />
  <select name="blood"><br />
    <option value="taxmaster">税理士</option>
    <option value="programer">プログラミング</option>
    <option value="rule">会社ルール</option>
    <option value="sonota">その他</option>
  </select>
  <br />
  <button type="submit">
    問題をDBへ新規登録しインデックス画面へ戻る
  </button>
</form>

</p>