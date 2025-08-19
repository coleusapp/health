<?php

namespace Coleus\Health;

use Coleus\Support\PivotWithDefaults;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthPivotDefaults newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthPivotDefaults newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthPivotDefaults query()
 * @mixin \Eloquent
 */
class HealthPivotDefaults extends PivotWithDefaults
{
    public static ?string $tablePrefix = 'health.table_prefix';
}
