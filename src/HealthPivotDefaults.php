<?php

namespace Coleus\Health;

use Coleus\Support\PivotWithDefaults;

class HealthPivotDefaults extends PivotWithDefaults
{
    public static ?string $tablePrefix = 'health.table_prefix';
}
