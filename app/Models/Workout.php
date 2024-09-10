<?php

namespace App\Models;

use App\Settings\GeneralSettings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @mixin \Eloquent
 */
class Workout extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function casts()
    {
        return [
            'date' => 'datetime',
            'weight' => \App\Casts\Weight::class,
        ];
    }

    public function save(array $options = [])
    {
        $this->user_id = auth()->id();

        return parent::save($options);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function date(): Attribute
    {
        $timezone = app(GeneralSettings::class)->timezone;

        return Attribute::make(
            get: fn (string $date) => Carbon::parse($date)->setTimezone($timezone),
            set: fn (string $date) => Carbon::parse($date)->shiftTimezone($timezone)->setTimezone('UTC'),
        );
    }
}
