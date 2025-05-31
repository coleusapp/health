<?php

namespace Coleus\Health\Models;

use App\Casts\DistanceCast;
use App\Casts\WeightCast;
use Coleus\Support\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\Workout;

/**
 * 
 *
 * @property int $id
 * @property int $workout_id
 * @property int $exercise_id
 * @property int|null $reps
 * @property mixed|null $weight
 * @property mixed|null $distance
 * @property int|null $duration
 * @property int|null $calorie
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Coleus\Health\Models\Exercise $exercise
 * @property-read \App\Models\User $user
 * @property-read \Coleus\Health\Models\Workout $workout
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereCalorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereExerciseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereReps($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseWorkout whereWorkoutId($value)
 * @mixin \Eloquent
 */
class ExerciseWorkout extends Pivot
{
    use AutoAssignUser;

    public $incrementing = true;

    public $casts = [
        'weight' => WeightCast::class,
        'distance' => DistanceCast::class,
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
