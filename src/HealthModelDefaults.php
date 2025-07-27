<?php

namespace Coleus\Health;

use Coleus\Support\ModelWithDefaults;

class HealthModelDefaults extends ModelWithDefaults
{
    public static ?string $tablePrefix = 'health.table_prefix';
}
