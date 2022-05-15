<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FootBallFieldStatusEnum extends Enum
{
    const TRONG = 0;
    const DANG_THUE = 1;
    const DANG_SUA_CHUA = 2;

    public static function getArrayView()
    {
        return [
            'Trống' => self::TRONG,
            'Đang Cho Thuê' => self::DANG_THUE,
            'Đang Sửa Chữa' => self::DANG_SUA_CHUA,
        ];
    }

}
