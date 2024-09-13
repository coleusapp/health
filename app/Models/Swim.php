<?php

namespace App\Models;

use App\Casts\TimezoneDatetime;
use App\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Swim extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoAssignUser;

    public function casts()
    {
        return [
            'date' => TimezoneDatetime::class,
        ];
    }

    public function swimmingType(): BelongsTo
    {
        return $this->belongsTo(SwimmingType::class);
    }
}
