<?php

namespace Coleus\Health\Contracts;

interface Duration
{
    public function secondToMinute($duration): float;
    public function secondToHour($duration): float;
    public function minuteToSecond($duration): float;
    public function hourToSecond($duration): float;
}
