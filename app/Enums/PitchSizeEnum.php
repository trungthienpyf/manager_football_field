<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PitchSizeEnum extends Enum
{
    const SAN_7 = 1;
    const SAN_11 = 2;
    public static function getArrayView()
    {
        return [
            'Sân 7' => self::SAN_7,
            'Sân 11' => self::SAN_11,
        ];
    }
}
