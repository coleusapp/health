<?php

namespace Coleus\Health\Services\Conversions;

use Coleus\Health\Contracts\Duration;

class DurationConversion implements Duration
{
    public function secondToMinute($duration): float
    {
        return $duration / 60;
    }

    public function secondToHour($duration): float
    {
        return $duration / 3600;
    }

    public function minuteToSecond($duration): float
    {
        return $duration * 60;
    }

    public function hourToSecond($duration): float
    {
        return $duration * 3600;
    }
}
