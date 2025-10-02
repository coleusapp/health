<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\MuscleGroupData;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Support\Services\Service;

class MuscleGroupService extends Service
{
    protected $model = MuscleGroup::class;

    protected $data = MuscleGroupData::class;
}
