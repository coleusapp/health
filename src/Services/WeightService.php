<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\HealthUser;
use Coleus\Table\Searchable;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class WeightService extends Table
{
    use Searchable;

    public static function query(): Builder
    {
        return HealthUser::user()->weights()
            ->when(static::hasSearchQuery(), fn ($query) => static::searchQuery($query))
            ->when(static::hasSortQuery(), fn ($query) => static::sortQuery($query))
            ->orderBy('created_at', 'desc')
            ->getQuery();
    }

    protected static function searchQuery(Builder $query): Builder
    {
        return $query->where(function (Builder $builder) {
            $builder->orWhere('weight', request(static::$searchQuery))
                ->orWhereDate('date', request(static::$searchQuery))
                ->orWhereDay('date', request(static::$searchQuery))
                ->orWhereMonth('date', request(static::$searchQuery))
                ->orWhereYear('date', request(static::$searchQuery))
                ->orWhereTime('date', request(static::$searchQuery));
        });
    }

    protected static function sortQuery(Builder $query): Builder
    {
        return match (request(static::$sortQuery)) {
            'date' => $query->orderBy('date', 'desc'),
            '-date' => $query->orderBy('date'),
            'weight' => $query->orderBy('weight', 'desc'),
            '-weight' => $query->orderBy('weight'),
            default => $query->orderBy('created_at', 'desc'),
        };
    }
}