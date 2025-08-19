<?php

namespace Coleus\Health;

use Coleus\Support\ModelWithDefaults;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthModelDefaults newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthModelDefaults newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthModelDefaults query()
 * @mixin \Eloquent
 */
class HealthModelDefaults extends ModelWithDefaults
{
    public static ?string $tablePrefix = 'health.table_prefix';
}
