<?php

namespace App\Concerns;

interface DistanceConcern
{
    public function kmToM($distance): float;
    public function MiToM($distance): float;
    public function MToKm($distance): float;
    public function MToMi($distance): float;
}
