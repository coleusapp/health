<?php

namespace App\Services;

use App\Concerns\DurationConcern;

class DurationService implements DurationConcern
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
