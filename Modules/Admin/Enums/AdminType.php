<?php

namespace Modules\Admin\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SUPER_USER()
 * @method static static KITCHEN_STAFF()
 * @method static static HOSPITAL_CLERK()
 */
final class AdminType extends Enum
{
    const SUPER_USER = 1;
    const KITCHEN_STAFF = 2;
    const HOSPITAL_CLERK = 3;

    public static function getDescription($value): string
    {
        return match ($value) {
            self::SUPER_USER => '管理者',
            self::KITCHEN_STAFF => 'スタッフ',
            self::HOSPITAL_CLERK => '受付',
            default => parent::getDescription($value),
        };
    }
}
