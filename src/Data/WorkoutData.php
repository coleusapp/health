<?php

namespace Coleus\Health\Data;

use Spatie\LaravelData\Data;

class WorkoutData extends Data
{
    public string $date;

    public function __construct(
        //
    )
    {
        $this->date = now(config('app.timezone'));
    }
}
