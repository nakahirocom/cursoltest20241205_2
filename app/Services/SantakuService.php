<?php

namespace App\Services;

use App\Models\Santaku;

class SantakuService
{
    //自分の作成問題かをチェックするメソッド
    public function checkOwnMondai(int $userId, int $santakuId): bool
    {
        $santaku = Santaku::where('id', $santakuId)->first();
        if (! $santaku) {
            return false;
        }

        return $santaku->user_id === $userId;
    }
}
