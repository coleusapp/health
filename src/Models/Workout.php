<?php

namespace Coleus\Health\Models;

use Coleus\Health\Casts\TimezoneCast;
use Coleus\Health\Database\Factories\WorkoutFactory;
use Coleus\Health\HealthModelDefaults;
use Coleus\Users\Concerns\HasUser;
use Coleus\Users\Models\Scopes\UserScope;
use Coleus\Users\Models\User;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $date
 * @property int $duration
 * @property string|null $notes
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Workout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workout onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Workout query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Workout withoutTrashed()
 *
 * @property int $sets
 * @property int|null $reps
 * @property int|null $weight
 * @property int|null $distance
 * @property int $exercise_id
 * @property-read Exercise $exercise
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereExerciseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereReps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereSets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereWeight($value)
 *
 * @property-read User $user
 * @property-read Collection<int, Exercise> $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout user($users)
 *
 * @mixin \Eloquent
 */
#[ScopedBy([UserScope::class])]
class Workout extends HealthModelDefaults
{
    use HasFactory;
    use HasUser;
    use SoftDeletes;

    public function casts(): array
    {
        return [
            'date' => TimezoneCast::class,
        ];
    }

    protected static function newFactory(): WorkoutFactory
    {
        return WorkoutFactory::new();
    }

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercise::class, config('health.table_prefix').'exercise_workout')
            ->withPivot('id', 'reps', 'weight', 'distance', 'duration', 'calorie')
            ->withTimestamps();
    }
}
