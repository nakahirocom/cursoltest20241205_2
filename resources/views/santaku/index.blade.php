<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="/css/app.css">
    <title>santakuアプリ</title>

</head>

<body class="bg-gradient-to-r from-pink-100 via-blue-100 to-purple-100 px-4 sm:px-8 lg:px-64">
    <div>
        @if (Route::has('login'))
        <div class="fixed top-0 right-0 px-6 py-4">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        @auth
        <div class="container mx-auto my-4">
            <p class="text-2xl text-center">三択アプリ</p>
            <nav>
                <ol>
                    <li class="breadcrumb-item"><span>{{ Auth::user()->name }}</span> がログイン中</li>
                    {{ Auth::user()->continuous_correct_answers }}問連続正解中
                </ol>
            </nav>
        </div>
        @endauth

        <div class="mx-auto my-4">
            <ul>
                <li class="mb-3">
                    <a href="/santakuset"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">0.出題ジャンルの選択を行う</a>
                </li>
                <li class="mb-3">
                    <a href="/question"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">1.選んだジャンルを解きまくる</a>
                </li>
                <li class="mb-3">
                    <a href="/incorrect"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">2.最近間違えた問題を確認する</a>
                </li>
                <li class="mb-3">
                    <a href="/new"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">3.新しく問題を登録する</a>
                </li>
                <li class="mb-3">
                    <a href="/mymemolist"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">4.私のメモ一覧を見る</a>
                </li>

            </ul>
        </div>

        <div class="container mx-auto my-1">
            <div class="flex flex-col">
                <!-- 見出し -->
                <div class="bg-gray-200 p-2 mb-2">
                    <div class="flex justify-between">
                        <span class="text-xs font-semibold flex-grow text-left">今の連続記録 / user</span>
                        <span class="text-xs font-semibold flex-grow text-right">/ 過去最高記録</span>
                    </div>
                </div>
                <!-- ユーザーリスト -->
                @foreach ($users as $index => $user)
                <div
                    class="{{ $user->id == $currentUser ? 'bg-blue-300 border-blue-500' : 'bg-white border-gray-200' }} flex items-center justify-between border-b p-1 mb-1">
                    <span class="text-xs">{{ $loop->iteration }}位　</span>
                    <div class="text-xs text-gray-600 flex-grow text-cdnter font-semibold">{{
                        $user->continuous_correct_answers }}問　/</div>
                    <div class="flex-grow-0 flex-shrink-0 w-1/4 flex items-left">
                        <div class="text-xs text-gray-800 mr-3">{{ $user->id == $currentUser ? $user->name: '非表示' }}さん
                        </div>
                    </div>
                    <div class="text-xs flex-grow text-right">
                        @if ($user->continuous_correct_answers >= $user->best_record)
                        <span class="font-bold text-red-600 bg-yellow-100 p-1 rounded">/ 記録更新中</span>
                        @else
                        /　 {{ $user->best_record }}問
                        @endif
                    </div>
                    <div class="text-xs text-gray-600 flex-grow ml-auto text-right">{{ date('Y-m-d',
                        strtotime($user->best_record_at)) }}</div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</body>