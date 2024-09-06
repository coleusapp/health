<?php

namespace App\Models;

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

    public function save(array $options = [])
    {
        $this->user_id = auth()->id();

        return parent::save($options);
    }

    public function swimmingType(): BelongsTo
    {
        return $this->belongsTo(SwimmingType::class);
    }

    public function date(): Attribute
    {
        $timezone = app(GeneralSettings::class)->timezone;

        return Attribute::make(
            get: fn (string $date) => Carbon::parse($date)->setTimezone($timezone),
            set: fn (string $date) => Carbon::parse($date)->shiftTimezone($timezone)->setTimezone('UTC'),
        );
    }
}
