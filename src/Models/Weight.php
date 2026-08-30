<?php

namespace Coleus\Health\Models;

use Coleus\Health\Database\Factories\WeightFactory;
use Coleus\Health\HealthModelDefaults;
use Coleus\Users\Concerns\HasUser;
use Coleus\Users\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $weight
 * @property string|null $unit
 * @property \Illuminate\Support\Carbon $date
 * @property int $user_id
 * @property-read \Coleus\Users\Models\User $user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Weight user($users)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Weight whereUnit($value)
 *
 * @mixin \Eloquent
 */
#[ScopedBy([UserScope::class])]
class Weight extends HealthModelDefaults
{
    /** @uses \Coleus\Health\Database\Factories\WeightFactory */
    use HasFactory;

    use HasUser;
    use SoftDeletes;

    public function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    protected static function newFactory(): WeightFactory|Factory
    {
        return WeightFactory::new();
    }
}
