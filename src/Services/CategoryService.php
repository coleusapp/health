<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\CategoryData;
use Coleus\Health\Http\Resources\CategoryAsOptionResource;
use Coleus\Health\Models\Category;
use Coleus\Support\Services\Concerns\CanBeOption;
use Coleus\Support\Services\Service;
use Illuminate\Database\Eloquent\Builder;

class CategoryService extends Service
{
    use CanBeOption;

    protected $model = Category::class;

    protected $data = CategoryData::class;

    protected string $optionResource = CategoryAsOptionResource::class;

    public function defaultQuery(): Builder
    {
        return parent::defaultQuery()
            ->withCount('exercises');
    }
}
