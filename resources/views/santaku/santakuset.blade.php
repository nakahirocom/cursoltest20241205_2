<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>santakuアプリ</title>
</head>
<body>
    <div class="container">

<a class="btn btn-link" href="/">index画面へ戻る</a>
@auth
<p>ようこそ、{{ Auth::user()->name }}さん</p>
<p>ユーザーidは、{{ Auth::user()->id }}です</p>
@endauth

<p>-----------------------------------------------------------------------------------------</p>
<h2>三択アプリ　{{ Auth::user()->name }}の出題範囲設定画面</h2>
<p>-----------------------------------------------------------------------------------------</p>
Ï
<form method="get" action="/question">■この設定で問題をとく<br />
    <span>選択数:</span>
    <br />
    <input type="radio" name="選択肢" value="2" />
    <span>2択</span>
    <input type="radio" name="選択肢" value="3" />
    <span>3択</span>
    <input type="radio" name="選択肢" value="4" />
    <span>4択</span>
    <br />
    <br />
    <span>選択ジャンル:</span>
    <br />
    <input type="checkbox" name="ジャンル" value="javascript" />
    <span>javascript</span>
    <input type="checkbox" name="ジャンル" value="node.js" />
    <span>node.js</span>
    <input type="checkbox" name="ジャンル" value="taxmaster" />
    <span>税理士</span>
    <input type="checkbox" name="ジャンル" value="boki" />
    <span>簿記</span>
    <br />
    <button type="submit">選択問題をとく</button>
</form>
</div>
</body>
