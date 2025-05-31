<?php

namespace Coleus\Health\Enums;

use Coleus\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum WeightEnum: string implements HasLabel
{
    case LBS = 'lbs';
    case KG = 'kg';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::LBS => 'lbs',
            self::KG => 'kg',
        };
    }
}
