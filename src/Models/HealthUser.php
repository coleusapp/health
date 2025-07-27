<?php

namespace Coleus\Health\Models;

use Coleus\Users\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class HealthUser extends User
{
    protected $table = 'users';

    public function weights(): MorphToMany
    {
        return $this->morphedByMany(
            Weight::class,
            'model',
            'model_has_users',
            'user_id',
            'model_id',
        );
    }
}
