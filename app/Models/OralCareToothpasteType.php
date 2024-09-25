<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

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
