<?php

namespace Coleus\Health\Contracts;

interface Distance
{
    public function kmToM($distance): float;
    public function MiToM($distance): float;
    public function MToKm($distance): float;
    public function MToMi($distance): float;
}
