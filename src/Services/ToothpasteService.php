<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\ToothpasteData;
use Coleus\Health\Http\Resources\ToothpasteAsOptionResource;
use Coleus\Health\Models\Toothpaste;
use Coleus\Support\Services\Concerns\CanBeOption;
use Coleus\Support\Services\Service;

class ToothpasteService extends Service
{
    use CanBeOption;

    protected $model = Toothpaste::class;

    protected $data = ToothpasteData::class;

    protected string $optionResource = ToothpasteAsOptionResource::class;
}
