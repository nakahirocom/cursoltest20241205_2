<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>santakuアプリ</title>
</head>

<body class="bg-gradient-to-r from-pink-100 via-blue-100 to-purple-100 px-4 sm:px-8 lg:px-64">
    @auth
    <div class="flex justify-end items-center">
        <div>
            <a class="btn btn-link text-gray-500 hover:text-gray-700 underline decoration-gray-500 hover:decoration-blue-700 transition duration-300 ease-in-out"
                href="/">HOMEへ</a>
        </div>
    </div>
    @endauth


    <div class="container text-left relative">
        <form action="{{ route('check.register') }}" method="post"
            class="border-2 border-gray-300 rounded-md p-1 shadow-lg relative">
            <div class="flex justify-between m-0">
                <div class="flex-none m-0">
                    【ジャンルを選択】
                </div>
                <button type="button" onclick="toggleAllCheckboxes()"
                    class="bg-gradient-to-br from-orange-300 to-orange-800 hover:bg-gradient-to-tl text-white rounded px-1 py-1">
                    全選択/全解除
                </button>

            </div>
            @csrf
            @foreach($largelabelList as $largelabel)
            <div class="bflex justify-between m-0">
                <div class="font-bold text-lg">
                    分類：{{ $largelabel->large_label }}

                    <button type="button" onclick="toggleCheckboxes('{{ $largelabel->id }}')"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-0 px-0 border border-gray-300 rounded shadow-sm hover:shadow-md transition ease-in-out duration-150">
                        選択解除</button>
                </div>

                <div class="flex flex-wrap gap-x-4 gap-y-2">
                    @foreach ($middlelabelList as $middlelabel)
                    @if($largelabel->id == $middlelabel->large_label_id)
                    <div class="flex flex-col">
                        <div class="font-semibold text-sm mb-2">{{ $middlelabel->middle_label }}</div>

                        @foreach ($selectList as $user_select)
                        @if ($middlelabel->id == $user_select->smallLabel->middle_label_id)
                        <div class="flex items-center mb-2">
                            <input type="hidden" name="labelstorages_id[{{ $user_select['id'] }}]" value="0">
                            <input type="checkbox" id="{{ $user_select->smallLabel->small_label }}"
                                name="labelstorages_id[{{ $user_select['id'] }}]" value="1"
                                class="form-checkbox h-6 w-6 text-blue-600 rounded focus:ring-blue-500 border-gray-300 shadow-md transition duration-150 ease-in-out"
                                {{ $user_select['selected'] ? 'checked' : '' }}
                                data-large-label-id="{{ $largelabel->id }}">
                            <label for="{{ $user_select->smallLabel->small_label }}"
                                class="text-sm ml-2 text-gray-700 font-medium">
                                {{ $user_select->smallLabel->small_label }}
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <br>
            @endforeach

            <div class="flex space-x-2">
                <button type="submit"
                    class="bg-gradient-to-br from-blue-300 to-blue-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2"
                    name="KeepForIndex">
                    保存してホームへ
                </button>

                <button type="button" onclick="resetCheckboxes()"
                    class="bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2">
                    初期選択に戻す
                </button>
            </div>
        </form>
    </div>

    <script>
        // ページが読み込まれた時にチェックボックスの状態を保存
        document.addEventListener('DOMContentLoaded', () => {
            window.initialCheckboxStates = {};
            document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                window.initialCheckboxStates[checkbox.id] = checkbox.checked;
            });
        });

        // リセット機能
        function resetCheckboxes() {
            for (const id in window.initialCheckboxStates) {
                const checkbox = document.getElementById(id);
                if (checkbox) {
                    checkbox.checked = window.initialCheckboxStates[id];
                }
            }
        }

        
            function toggleCheckboxes(largeLabelId) {
                const checkboxes = document.querySelectorAll(`input[name^='labelstorages_id'][data-large-label-id='${largeLabelId}']`);
                let allChecked = true;
                checkboxes.forEach((checkbox) => {
                    if (!checkbox.checked) {
                        allChecked = false;
                    }
                });
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = !allChecked;
                });
            }

            function toggleAllCheckboxes() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

        checkboxes.forEach((checkbox) => {
            checkbox.checked = !allChecked;
        });
    }
    </script>

    </div>

</body>

</html>