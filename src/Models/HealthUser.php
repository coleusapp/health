<?php

namespace Coleus\Health\Models;

use Coleus\Users\Models\UserAlias;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Coleus\Health\Models\Weight> $weights
 * @property-read int|null $weights_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthUser withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 * @mixin \App\Models\User::class
 * @mixin \Coleus\Users\Models\User::class
 */
class HealthUser extends UserAlias
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
