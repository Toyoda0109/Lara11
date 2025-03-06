<?php

namespace App\Casts;

use App\Enums\UserRank;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserRankEnumCast implements CastsAttributes
{
    /**
     * モデルからデータ取得時のキャスト処理
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return UserRank::tryFrom($value);
    }

    /**
     * データ保存時のキャスト処理
     */
    public function set($model, string $key, $value, array $attributes)
    {

        return $value->value;
    }
}
