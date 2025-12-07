<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\MuscleGroupData;
use Coleus\Health\Http\Resources\MuscleGroupAsOptionResource;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Support\Services\Concerns\CanBeOption;
use Coleus\Support\Services\Service;

class MuscleGroupService extends Service
{
    use CanBeOption;

    protected $model = MuscleGroup::class;

    protected $data = MuscleGroupData::class;

    protected string $optionResource = MuscleGroupAsOptionResource::class;
}
