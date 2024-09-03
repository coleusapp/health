<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Habit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Habit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Habit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Habit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Habit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Habit withoutTrashed()
 * @mixin \Eloquent
 */
class Habit extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function save(array $options = [])
    {
        $this->user_id = auth()->id();

        return parent::save($options);
    }
}
