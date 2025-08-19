<?php

namespace Coleus\Health\Models;

use Coleus\Health\HealthPivotDefaults;

/**
 * @property int $id
 * @property int $exercise_id
 * @property int $muscle_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup whereExerciseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup whereMuscleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExerciseMuscleGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExerciseMuscleGroup extends HealthPivotDefaults
{
    //
}
