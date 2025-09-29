<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\CategoryData;
use Coleus\Health\Models\Category;
use Coleus\Support\Services\Service;

class CategoryService extends Service
{
    protected $model = Category::class;

    protected $data = CategoryData::class;
}
