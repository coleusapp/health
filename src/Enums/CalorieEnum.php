<?php

namespace Coleus\Health\Enums;

use Coleus\Support\Contracts\HasLabel;

enum CalorieEnum: string implements HasLabel
{
    case KCAL = 'kcal';
    case KJ = 'kj';

    public function getLabel(): string
    {
        return match ($this) {
            self::KCAL => 'kcal',
            self::KJ => 'kJ',
        };
    }
}
