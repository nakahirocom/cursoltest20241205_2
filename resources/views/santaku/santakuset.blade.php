<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>santakuアプリ</title>
</head>

<body>
    <div class="container">

        <a class="btn btn-link" href="/">index画面へ戻る</a>
        @auth
        <div class="container">
            <p class="h2">三択アプリ 出題されるジャンルを選択ください</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
                    <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
                </ol>
            </nav>

        </div>
        @endauth

        <form action="{{ route('check.register') }}" method="post">
            @csrf
            @foreach($largelabelList as $largelabel)
            <div>
                <summary>
                    <div class="collapse show" id="collapseExample" style="">
                        <p>＝＝＝＝＝＝＝＝＝＝＝＝＝＝{{ $largelabel->large_label }}（大分類）</p>

                        @foreach ($selectList as $user_select)
                        @if( $largelabel->id == $user_select->largelabel->id )
                        <form>
                            <div class="form-group">
                                <div class="checkbox-inline">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="hidden"
                                        name="labelstorages_id[{{ $user_select['id'] }}]" value="0">
                                    @if ($user_select['selected'] == 1)
                                    <input type="checkbox" checked="checked"
                                        id={{$user_select->middleLabel->middle_label }} name="labelstorages_id[{{
                                    $user_select['id'] }}]" value="1">
                                    <label class="form-check-label" for={{ $user_select->middleLabel->middle_label }}>
                                        {{ $user_select->middleLabel->middle_label }}（中分類）
                                    </label>
                                    @else
                                    <input type="checkbox" id={{$user_select->middleLabel->middle_label }}
                                    name="labelstorages_id[{{ $user_select['id'] }}]" value="1">

                                    <label class="form-check-label" for={{ $user_select->middleLabel->middle_label }}>
                                        {{ $user_select->middleLabel->middle_label }}（中分類）
                                    </label>
                                    @endif

                                </div>
                                @endif

                                @endforeach
                                <br>
                                @endforeach

                                <button class="btn btn-outline-primary" name="KeepForIndex"
                                    type="submit">ジャンルを保存後にインデックス画面へ</button>
                                <button class="btn btn-outline-primary" name="KeepForSantaku"
                                    type="submit">ジャンル保存後に問題を解く</button>

                        </form>
</body>