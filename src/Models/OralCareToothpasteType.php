<?php

namespace Coleus\Health\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Coleus\Health\Models\OralCare;
use Coleus\Health\Models\ToothpasteType;

/**
 * 
 *
 * @property int $id
 * @property int $oral_care_id
 * @property int $toothpaste_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Coleus\Health\Models\OralCare $oralCare
 * @property-read \Coleus\Health\Models\ToothpasteType $toothpasteType
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType whereOralCareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType whereToothpasteTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OralCareToothpasteType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OralCareToothpasteType extends Pivot
{
    public $incrementing = true;

    public function toothpasteType(): BelongsTo
    {
        return $this->belongsTo(ToothpasteType::class);
    }

    public function oralCare(): BelongsTo
    {
        return $this->belongsTo(OralCare::class);
    }
}
