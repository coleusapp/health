<?php

namespace Coleus\Health\Services\Conversions;

use Coleus\Health\Contracts\Weight;

class WeightConversion implements Weight
{
    public function lbsToKg($weight): float
    {
        return $this->gToKg($this->lbsToG($weight));
    }

    public function lbsToG($weight): float
    {
        return $weight * 453.59237;
    }

    public function kgToG($weight): float
    {
        return $weight * 1000;
    }

    public function kgToLbs($weight): float
    {
        return $this->gToLbs($this->kgToG($weight));
    }

    public function gToKg($weight): float
    {
        return $weight / 1000;
    }

    public function gToLbs($weight): float
    {
        return $weight / 453.59237;
    }
}
