<?php

namespace App\Services;

use App\Concerns\DistanceConcern;

class DistanceService implements DistanceConcern
{
    public function kmToM($distance): float
    {
        return $distance * 1000;
    }

    public function MiToM($distance): float
    {
        return $distance * 1609.34;
    }

    public function MToKm($distance): float
    {
        return $distance / 1000;
    }

    public function MToMi($distance): float
    {
        return $distance / 1609.34;
    }
}
