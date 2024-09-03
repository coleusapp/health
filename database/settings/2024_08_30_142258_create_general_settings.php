<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.timezone', 'UTC');
        $this->migrator->add('general.weight_unit', 'lbs');
        $this->migrator->add('general.distance_unit', 'mile');
    }
};
