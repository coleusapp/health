<?php

namespace Coleus\Health\Models;

use Coleus\Health\Casts\TimezoneDatetimeCast;
use Coleus\Support\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int $weight
 * @property \Illuminate\Support\Carbon $date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Weight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weight withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Weight withoutTrashed()
 * @mixin \Eloquent
 */
class Weight extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoAssignUser;

    public $fillable = ['weight', 'date'];

    public function casts(): array
    {
        return [
            'date' => TimezoneDatetimeCast::class,
            // 'weight' => \App\Casts\WeightCast::class,
        ];
    }
}
