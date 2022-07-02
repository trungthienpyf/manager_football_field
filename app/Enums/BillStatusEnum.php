<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BillStatusEnum extends Enum
{
    const DANG_DAT =   0;
    const DA_DUYET =   1;
    const DA_HUY = 2;
    public static function getArrayView()
    {
        return [
            'Đang xử lý' => self::DANG_DAT,
            'Đã duyệt' => self::DA_DUYET,
            'Đã hủy' => self::DA_HUY,
        ];
    }
}
