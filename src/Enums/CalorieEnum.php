<?php

namespace Coleus\Health\Enums;

use Coleus\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum CalorieEnum: string implements HasLabel
{
    case KCAL = 'kcal';
    case KJ = 'kj';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::KCAL => 'kcal',
            self::KJ => 'kJ',
        };
    }
}
