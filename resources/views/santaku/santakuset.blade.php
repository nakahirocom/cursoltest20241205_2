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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <title>santakuアプリ</title>
</head>

<body class="bg-blue-50 text-gray-800">
    


    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <a class="text-blue-600 hover:text-blue-800 mb-4" href="/">index画面へ戻る</a>
        <p class="text-xl font-semibold">三択アプリ ジャンルを選択</p>

        @auth
        <div class="flex ml-auto">
            <!-- ml-auto を追加 -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span>{{ Auth::user()->name }}</span> がログイン中</li>
                    <li class="breadcrumb-item active" aria-current="page">id{{ Auth::user()->id }}</li>
                </ol>
            </nav>
        </div>
        @endauth
        <!-- その他のフォーム要素やボタン -->
    </div>
        <div class="py-8 px-4 container mx-auto" style="background: linear-gradient(to right, #84fab0 0%, #8fd3f4 100%);">
            <form action="{{ route('check.register') }}" method="post" class="bg-white shadow rounded-lg p-6">
                @csrf                   @foreach($largelabelList as $largelabel)

            <summary>
                <div class="collapse show" id="collapseExample" style="">
                    <p class="font-bold text-xl mb-2">(大分類){{ $largelabel->large_label }}</p>

                    @foreach ($middlelabelList as $middlelabel)
                    @if( $largelabel->id == $middlelabel->large_label_id )

                    <div>
                        <summary>
                            <div class="collapse show" id="collapseExample" style="">
                                <p class="font-semibold text-lg mb-2">　(中分類){{ $middlelabel->middle_label }}</p>
                                @foreach ($selectList as $user_select)
                                @if ($middlelabel->id == $user_select->smallLabel->middle_label_id)
                                    <div class="form-group">
                                <form>
                                    
                                        <div class="checkbox-inline">
                                        </div>
                                        <div class="form-check">
                                            <input class="hidden" type="hidden" name="labelstorages_id[{{ $user_select['id'] }}]" value="0">
                                            @if ($user_select['selected'] == 1)
                                            <input type="checkbox" checked="checked" id="{{ $user_select->smallLabel->small_label }}" name="labelstorages_id[{{ $user_select['id'] }}]" value="1" class="form-checkbox h-5 w-5 text-blue-600 rounded focus:ring-blue-500 border-gray-300 shadow-md transition duration-150 ease-in-out">
                                            @else
                                            <input class="form-checkbox h-5 w-5 text-blue-600 rounded focus:ring-blue-500 border-gray-300 shadow-md transition duration-150 ease-in-out" type="checkbox" id="{{ $user_select->smallLabel->small_label }}" name="labelstorages_id[{{ $user_select['id'] }}]" value="1">
                                            @endif
                                            <label class="text-gray-700 font-medium ml-2" for="{{ $user_select->smallLabel->small_label }}">
                                                {{ $user_select->smallLabel->small_label }}（小分類）
                                            </label>                                        </div>
                                                                                </div>
                                        @endif

                                        @endforeach
                                        <br>
                                        @endif

                                        @endforeach

                                        @endforeach

                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="submit" name="KeepForIndex">
                                            ジャンルを保存後にインデックス画面へ
                                        </button>                                                                                               <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="KeepForSantaku">
                                            ジャンル保存後に問題を解く
                                        </button>
                                </form>
</body>