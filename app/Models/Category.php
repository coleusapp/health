<?php

namespace App\Models;

use App\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoAssignUser;

    public function categoryExercises(): HasMany
    {
        return $this->hasMany(CategoryExercise::class);
    }
}
