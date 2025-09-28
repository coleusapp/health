<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Weight;
use Illuminate\Pagination\LengthAwarePaginator;

class WeightService
{
    public static function index(): LengthAwarePaginator
    {
        return Weight::orderBy('created_at', 'desc')
            ->paginate();
    }

    public static function store(array $data): Weight
    {
        return Weight::create($data);
    }

    public static function update(Weight $weight, array $data): bool
    {
        return $weight->update($data);
    }

    public static function destroy(Weight $weight): bool
    {
        return $weight->delete();
    }
}
