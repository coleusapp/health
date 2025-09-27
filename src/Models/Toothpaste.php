<?php

namespace Coleus\Health\Models;

use Coleus\Health\Database\Factories\ToothpasteFactory;
use Coleus\Health\HealthModelDefaults;
use Coleus\Users\Concerns\HasUser;
use Coleus\Users\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Users\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste user($users)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Toothpaste withoutTrashed()
 * @mixin \Eloquent
 */
#[ScopedBy([UserScope::class])]
class Toothpaste extends HealthModelDefaults
{
    use SoftDeletes;
    use HasUser;
    use HasFactory;

    protected $table = 'toothpastes';

    protected static function newFactory(): ToothpasteFactory
    {
        return ToothpasteFactory::new();
    }
}
