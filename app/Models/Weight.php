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
 * @property int $weight
 * @property \Illuminate\Support\Carbon $date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Weight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight withoutTrashed()
 * @mixin \Eloquent
 */
class Weight extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function casts()
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function weight(): Attribute
    {
        return Attribute::make(
            get: fn (?float $value) => $value ? match (app(GeneralSettings::class)->weight_unit) {
                'kg' => round(app(WeightConcern::class)->gToKg($value), 2),
                'lbs' => round(app(WeightConcern::class)->gToLbs($value), 2),
                default => 0,
            } : null,
            set: fn (?float $value) => $value ? match (app(GeneralSettings::class)->weight_unit) {
                'kg' => app(WeightConcern::class)->kgToG($value),
                'lbs' => app(WeightConcern::class)->lbsToG($value),
                default => 0,
            } : null,
        );
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
