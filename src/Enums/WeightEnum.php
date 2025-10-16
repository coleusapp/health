<?php

namespace Coleus\Health\Enums;

use Coleus\Support\Contracts\HasLabel;

enum WeightEnum: string implements HasLabel
{
    case LBS = 'lbs';
    case KG = 'kg';

    public function getLabel(): string
    {
        return match ($this) {
            self::LBS => 'lbs',
            self::KG => 'kg',
        };
    }
}
