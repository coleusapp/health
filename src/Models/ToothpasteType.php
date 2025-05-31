<?php

namespace Coleus\Health\Models;

use Coleus\Support\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Coleus\Health\Models\OralCareToothpasteType;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Health\Models\OralCareToothpasteType> $oralCareToothpasteTypes
 * @property-read int|null $oral_care_toothpaste_types_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToothpasteType withoutTrashed()
 * @mixin \Eloquent
 */
class ToothpasteType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoAssignUser;

    public function oralCareToothpasteTypes(): HasMany
    {
        return $this->hasMany(OralCareToothpasteType::class);
    }
}
