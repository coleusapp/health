<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Set extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            $post->user_id = auth()->user()->id;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    protected function weight(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => round($value / 453.6, 2),
            set: fn (string $value) => round($value * 453.6, 2),
        );
    }
}
