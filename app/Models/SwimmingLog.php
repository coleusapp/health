<?php

namespace App\Models;

use App\Casts\TimezoneDatetime;
use App\Concerns\AutoAssignUser;
use App\Settings\GeneralSettings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SwimmingLog extends Model
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
