<?php

namespace App\Services;

use App\Concerns\WeightConcern;

class TinyCacheService
{
    protected static array $cache = [];

    public static function getOrPut(string $key, $flexible): mixed
    {
        if (array_key_exists($key, static::$cache)) {
            return static::$cache[$key];
        }

        static::$cache[$key] = $flexible();

        return static::$cache[$key];
    }
}
