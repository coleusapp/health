<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('navigation.weight', true);
        $this->migrator->add('navigation.workout', true);
        $this->migrator->add('navigation.oral_care', true);
        $this->migrator->add('navigation.swim', true);
    }
};
