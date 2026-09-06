<?php

namespace Coleus\Health\Facades;

use Coleus\Settings\SettingsScope;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed get(string $name, mixed $default = null)
 * @method static void set(string $name, mixed $value)
 * @method static bool has(string $name)
 * @method static void forget(string $name)
 * @method static array all()
 * @method static SettingsScope forUser(\Illuminate\Database\Eloquent\Model|int|string|null $user = null)
 *
 * @see SettingsScope
 */
class Settings extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'health.settings';
    }
}
