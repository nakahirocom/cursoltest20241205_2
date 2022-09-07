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

            <a class="btn" href="/">index画面へ戻る</a>
                <p>-----------------------------------------------------------------------------------------</p>
                <h2>三択アプリ　出題画面</h2>
                <p>-----------------------------------------------------------------------------------------</p>
                <span>■問題:</span>
            <div>
                <summary>
                    <p>{{ $question->question }}</p>
                </summary>
            </div>
                <p>---------------------------------------------------------------- </p>
        <span>■選択肢</span>

            <form action="{{ route('answer.index') }}" method="post">
                @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <input type="hidden" name="questions" value="{{ $questions }}">
                    <input type="hidden" name="shuffled0Id" value="{{ $shuffled0Id }}">
                    <input type="hidden" name="shuffled1Id" value="{{ $shuffled1Id }}">
                    <input type="hidden" name="shuffled2Id" value="{{ $shuffled2Id }}">
                @foreach($questions as $question)
                    <label>
                        <input type="radio" name="choice_id" value="{{ $question->id }}">
                            {{ $question->answer }}
                    </label>
                    <br />
                @endforeach
                <input type="submit" value="回答する">
            </form>

    </body>
</html>
