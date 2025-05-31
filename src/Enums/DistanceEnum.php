<?php

namespace Coleus\Health\Enums;

use Coleus\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum DistanceEnum: string implements HasLabel
{
    case Kilometer = 'kilometer';
    case Meter = 'meter';
    case Mile = 'mile';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Kilometer => 'Kilometer',
            self::Meter => 'Meter',
            self::Mile => 'Miles',
        };
    }
}
