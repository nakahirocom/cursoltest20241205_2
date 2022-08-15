<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>


<p>method-actionは </p>
<h1>viewのファイル名_list.blade.php [私が作った問題を一覧表示する]</h1>
<p>-----------------------------------------------------------------------------------------
  <br />
  <a class="btn" href="/">index画面へ戻る</a></p>
<p>-----------------------------------------------------------------------------------------</p>
@if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
@endif


<body>
    <h1>三択データベース</h1>

    <div>
        @foreach($santaku as $santaku1)
        <details>
            <summary>
              <p>問題{{ $santaku1->question }}</p>
              <p>答え{{ $santaku1->answer }}</p>
              <p>解説{{ $santaku1->comment }}</p></summary>
            <div>
              <a href="{{ route('edit', ['santakuId' => $santaku1->id]) }}">編集</a>
              <form action="{{ route('delete', ['santakuId' => $santaku1->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">削除</button>
              </form>
            </div>
          </details>
            @endforeach
    </div>
</body>

  <p>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</p>
<ul>この画面からの移動先<li><a href="/">1.〇index画面へ /resources/views/santaku/index.blade.php</a></li>
    <li>2.✕問題と答えを新規作成画面へ /resources/views/santaku/new.blade.php</li>
    <li>3.✕あなたの三択設定画面へ /resources/views/santaku/sentakuset.blade.php</li>
    <li>4.✕三択を解く画面へ /resources/views/santaku/question.blade.php</a></li>
    <li>5.✕自分が作成した問題を一覧表示する画面へ /resources/views/santaku/list.blade.php</li>
    <li> <a href="{{ route('edit', ['santakuId' => $santaku1->id]) }}">〇6.問題と答えを編集する画面へ /resources/views/santaku/edit.blade.php</a></li>
</ul>