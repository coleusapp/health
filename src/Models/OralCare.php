<?php

namespace Coleus\Health\Models;

use Coleus\Health\Database\Factories\OralCareFactory;
use Coleus\Health\HealthModelDefaults;
use Coleus\Users\Concerns\HasUser;
use Coleus\Users\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $date
 * @property int|null $duration
 * @property int $brushed
 * @property int $flossed
 * @property int $fluoride_taken
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Health\Models\OralCareToothpaste> $oralCareToothpaste
 * @property-read int|null $oral_care_toothpastes_count
 * @property-read \Coleus\Users\Models\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereBrushed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereFlossed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereFluorideTaken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare withoutTrashed()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Users\Models\User> $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCare user($users)
 *
 * @mixin \Eloquent
 */
#[ScopedBy([UserScope::class])]
class OralCare extends HealthModelDefaults
{
    use HasFactory;
    use HasUser;
    use SoftDeletes;

    public function casts(): array
    {
        return [
            'date' => 'datetime',
            'brushed' => 'boolean',
            'flossed' => 'boolean',
            'fluoride_taken' => 'boolean',
        ];
    }

    protected static function newFactory(): OralCareFactory
    {
        return OralCareFactory::new();
    }

    public function toothpastes(): BelongsToMany
    {
        return $this->belongsToMany(Toothpaste::class, config(static::$tablePrefix).'oral_care_toothpaste')
            ->withTimestamps();
    }
}
