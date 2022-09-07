<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>

<body>
    <a class="btn" href="/">index画面へ戻る</a></p>
    <p>-----------------------------------------------------------------------------------------<br />
    <h2>三択アプリ　編集・削除画面</h2>
    <p>-----------------------------------------------------------------------------------------</p>
    @if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
    @endif

    <form action="{{ route('update.put', ['santakuId' => $santaku->id])
              }}" method="post">■問題と回答を編集してください
        @method('PUT')
        @csrf
        <br />
        <span>問題:</span>
        <br />
        <textarea type="text" name="question">
                {{ $santaku->question }}
            </textarea>

        <br />
        <span>答え:</span>
        <br />
        <textarea type="text" name="answer">
                {{ $santaku->answer }}
            </textarea>

        <br />
        <span>解説:</span>
        <br />
        <textarea type="text" name="comment">
                {{ $santaku->comment }}
            </textarea>

        <br />
        <span>ジャンル:</span>
        <br />
        <select name="blood"><br />
            <option value="taxmaster">税理士</option>
            <option value="programer">プログラミング</option>
            <option value="rule">会社ルール</option>
            <option value="sonota">その他</option>
        </select><br />

        <button type="submit">編集したものを登録する</button>
    </form>
    <br />

    <form action="{{ route('delete', ['santakuId' => $santaku->id])
                    }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">この問題を削除する</button>
    </form>

</body>

</html>