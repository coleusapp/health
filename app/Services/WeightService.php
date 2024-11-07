<?php

namespace App\Services;

use App\Concerns\WeightConcern;

class WeightService implements WeightConcern
{
    public function lbsToKg($weight): float
    {
        return $weight * 0.45359237;
    }

    public function lbsToG($weight): float
    {
        return $this->kgToG($this->lbsToKg($weight));
    }

    public function kgToG($weight): float
    {
        return $weight * 1000;
    }

    public function kgToLbs($weight): float
    {
        return $weight * 2.2046226218;
    }

    public function gToKg($weight): float
    {
        return $weight / 1000;
    }

    public function gToLbs($weight): float
    {
        return $this->kgToLbs($this->gToKg($weight));
    }
}
