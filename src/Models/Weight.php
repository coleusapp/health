<?php

namespace Coleus\Health\Models;

use Coleus\Health\Casts\TimezoneDatetimeCast;
use Coleus\Health\Database\Factories\WeightFactory;
use Coleus\Health\HealthModelDefaults;
use Coleus\Users\Concerns\HasUser;
use Coleus\Users\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $weight
 * @property \Illuminate\Support\Carbon $date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Coleus\Users\Models\User $user
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
 * @property string|null $unit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Users\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Weight user($users)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Weight whereUnit($value)
 * @mixin \Eloquent
 */
#[ScopedBy([UserScope::class])]
class Weight extends HealthModelDefaults
{
    use SoftDeletes;
    use HasUser;
    /** @uses \Coleus\Health\Database\Factories\WeightFactory */
    use HasFactory;

    public function casts(): array
    {
        return [
            'date' => TimezoneDatetimeCast::class,
            // 'weight' => \App\Casts\WeightCast::class,
        ];
    }

    protected static function newFactory(): WeightFactory|\Illuminate\Database\Eloquent\Factories\Factory
    {
        return WeightFactory::new();
    }
}
