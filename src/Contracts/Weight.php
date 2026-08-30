<?php

namespace Coleus\Health\Contracts;

interface Weight
{
    public function lbsToKg($weight): float;
    public function lbsToG($weight): float;
    public function kgToG($weight): float;
    public function kgToLbs($weight): float;
    public function gToKg($weight): float;
    public function gToLbs($weight): float;
}
