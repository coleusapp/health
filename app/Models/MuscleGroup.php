<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup withoutTrashed()
 * @property int|null $muscle_group_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, MuscleGroup> $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, MuscleGroup> $muscleGroups
 * @property-read int|null $muscle_groups_count
 * @property-read MuscleGroup|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|MuscleGroup whereMuscleGroupId($value)
 * @mixin \Eloquent
 */
class MuscleGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function save(array $options = [])
    {
        $this->user_id = auth()->id();

        return parent::save($options);
    }

    public function muscleGroups(): HasMany
    {
        return $this->hasMany(MuscleGroup::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MuscleGroup::class, 'muscle_group_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MuscleGroup::class, 'muscle_group_id');
    }
}
