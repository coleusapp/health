<?php

namespace Coleus\Health\Models;

use Coleus\Health\HealthModelDefaults;
use Coleus\Users\Concerns\HasUser;
use Coleus\Users\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Health\Models\OralCareToothpasteType> $oralCareToothpasteTypes
 * @property-read int|null $oral_care_toothpaste_types_count
 * @property-read \Coleus\Users\Models\User $user
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
 * @mixin \Eloquent
 */
#[ScopedBy([UserScope::class])]
class OralCare extends HealthModelDefaults
{
    use SoftDeletes;
    use HasUser;

    public function oralCareToothpasteTypes(): HasMany
    {
        return $this->hasMany(OralCareToothpasteType::class);
    }
}
