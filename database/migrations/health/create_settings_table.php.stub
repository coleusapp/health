<?php

use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add(config('health.settings_prefix').'_general.timezone', 'UTC');
        $this->migrator->add(config('health.settings_prefix').'_general.weight_unit', WeightEnum::KG->value);
        $this->migrator->add(config('health.settings_prefix').'_general.distance_unit', DistanceEnum::Mile->value);
        $this->migrator->add(config('health.settings_prefix').'_general.duration_unit', DurationEnum::Minute->value);
        $this->migrator->add(config('health.settings_prefix').'_general.calorie_unit', CalorieEnum::KCAL->value);
    }

    public function down(): void
    {
        $this->migrator->delete(config('health.settings_prefix').'_general.timezone');
        $this->migrator->delete(config('health.settings_prefix').'_general.weight_unit');
        $this->migrator->delete(config('health.settings_prefix').'_general.distance_unit');
        $this->migrator->delete(config('health.settings_prefix').'_general.duration_unit');
        $this->migrator->delete(config('health.settings_prefix').'_general.calorie_unit');
    }
};
