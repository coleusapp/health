<?php

namespace Coleus\Health\Enums;

use Coleus\Support\Contracts\HasLabel;

enum DurationEnum: string implements HasLabel
{
    case Second = 'second';
    case Minute = 'minute';
    case Hour = 'hour';

    public function getLabel(): string
    {
        return match ($this) {
            self::Second => 'Second',
            self::Minute => 'Minute',
            self::Hour => 'Hour',
        };
    }
}
