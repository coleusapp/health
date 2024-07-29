<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property string $weight
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Weight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereWeight($value)
 * @mixin \Eloquent
 */
class Weight extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'weight' => 'float',
        ];
    }

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

    protected function weight(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => round($value / 453.6, 2),
            set: fn (string $value) => round($value * 453.6, 2),
        );
    }
}
