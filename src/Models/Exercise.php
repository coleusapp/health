<?php

namespace Coleus\Health\Models;

use Coleus\Support\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $category_id
 * @property int $muscle_group_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereMuscleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise withoutTrashed()
 * @property-read \App\Models\MuscleGroup $muscleGroup
 * @property bool $has_rep
 * @property bool $has_weight
 * @property bool $has_distance
 * @property int $has_calorie
 * @property string|null $weight_unit
 * @property string|null $distance_unit
 * @property bool $has_duration
 * @property string|null $duration_unit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Extensions\Health\Models\CategoryExercise> $categoryExercises
 * @property-read int|null $category_exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Health\Models\MuscleGroup> $muscleGroups
 * @property-read int|null $exercise_muscle_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Health\Models\ExerciseWorkout> $exerciseWorkouts
 * @property-read int|null $exercise_workouts_count
 * @property-read \Coleus\Users\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereDistanceUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereDurationUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereHasCalorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereHasDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereHasDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereHasRep($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereHasWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereWeightUnit($value)
 * @mixin \Eloquent
 */
class Exercise extends Model
{
    use SoftDeletes;
    use AutoAssignUser;

    protected $casts = [
        'has_rep' => 'bool',
        'has_weight' => 'bool',
        'has_distance' => 'bool',
        'has_calorie' => 'bool',
        'has_duration' => 'bool',
    ];

    protected $fillable = [
        'name',
        'description',
        'has_rep',
        'has_weight',
        'has_distance',
        'has_calorie',
        'weight_unit',
        'distance_unit',
        'has_duration',
        'duration_unit',
    ];

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->guarded[] = $this->primaryKey;
        $this->table = config('health.table_prefix').$this->getTable() ?: parent::getTable();
    }

    public function muscleGroups(): BelongsToMany
    {
        return $this->belongsToMany(MuscleGroup::class);
    }

    public function workouts(): BelongsToMany
    {
        return $this->belongsToMany(Workout::class)
            ->withPivot('id', 'reps', 'weight', 'distance', 'duration', 'calorie')
            ->withTimestamps();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
