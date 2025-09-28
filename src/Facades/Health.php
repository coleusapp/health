<?php

namespace Coleus\Health\Facades;

use Illuminate\Support\Facades\Facade;

class Health extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'health';
    }
}
