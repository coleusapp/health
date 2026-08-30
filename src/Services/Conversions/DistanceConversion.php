<?php

namespace Coleus\Health\Services\Conversions;

use Coleus\Health\Contracts\Distance;

class DistanceConversion implements Distance
{
    public function kmToM($distance): float
    {
        return $distance * 1000;
    }

    public function MiToM($distance): float
    {
        return $distance * 1609.344;
    }

    public function MToKm($distance): float
    {
        return $distance / 1000;
    }

    public function MToMi($distance): float
    {
        return $distance / 1609.344;
    }
}
