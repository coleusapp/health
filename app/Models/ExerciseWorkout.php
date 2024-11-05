<?php

namespace App\Models;

use App\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciseWorkout extends Pivot
{
    use AutoAssignUser;

    public $incrementing = true;

    public $casts = [
        'weight' => \App\Casts\Weight::class,
    ];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function workout(): BelongsTo
    {
        return $this->belongsTo(Workout::class);
    }
}
