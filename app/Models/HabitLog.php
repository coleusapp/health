<?php

namespace App\Models;

use App\Concerns\WeightConcern;
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
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $note
 * @property int $habit_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Habit $habit
 * @property string $weight
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereHabitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HabitLog withoutTrashed()
 * @mixin \Eloquent
 */
class HabitLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    public function save(array $options = [])
    {
        $this->user_id = auth()->id();

        return parent::save($options);
    }

    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
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
