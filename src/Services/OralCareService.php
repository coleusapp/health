<?php

namespace Coleus\Health\Services;

use Coleus\Health\Http\Requests\OralCareRequest;
use Coleus\Health\Models\OralCare;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class OralCareService
{
    public static function index(): LengthAwarePaginator
    {
        return OralCare::orderBy('created_at', 'desc')
            ->paginate();
    }

    public static function store(array $data): OralCare
    {
        return static::save($data);
    }

    public static function update(OralCare $oralCare, array $data): OralCare
    {
        return static::save($data, $oralCare);
    }

    public static function destroy(OralCare $oralCare): bool
    {
        return $oralCare->delete();
    }

    protected static function save(array $data, ?OralCare $oralCare = null): OralCare
    {
        if ($oralCare) {
            $oralCare->update($data);
        } else {
            $oralCare = OralCare::create($data);
        }

        DB::transaction(function () use ($oralCare, $data) {
            $oralCare->toothpastes()->detach();
            collect($data['toothpastes'] ?? [])
                ->each(function ($toothpaste) use ($oralCare) {
                    $oralCare->toothpastes()->attach($toothpaste['toothpaste_id']);
                });
        });

        return $oralCare;
    }
}
