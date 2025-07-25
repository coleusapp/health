<?php

namespace Coleus\Health\Models;

use Coleus\Health\Casts\TimezoneDatetimeCast;
use Coleus\Support\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $date
 * @property int $duration
 * @property string|null $notes
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
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
 * @property int $sets
 * @property int|null $reps
 * @property int|null $weight
 * @property int|null $distance
 * @property int $exercise_id
 * @property-read \App\Models\Exercise $exercise
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereExerciseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereReps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereSets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workout whereWeight($value)
 * @property-read \Coleus\Users\Models\User $user
 * @mixin \Eloquent
 */
class Workout extends Model
{
    use SoftDeletes;
    use AutoAssignUser;

    public $fillable = ['date'];

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->guarded[] = $this->primaryKey;
        $this->table = config('health.table_prefix').$this->getTable() ?: parent::getTable();
    }

    public function casts(): array
    {
        return [
            'date' => TimezoneDatetimeCast::class,
        ];
    }

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercise::class)
            ->withPivot('id', 'reps', 'weight', 'distance', 'duration', 'calorie')
            ->withTimestamps();
    }
}
