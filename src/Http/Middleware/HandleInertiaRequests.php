<?php

namespace Coleus\Health\Http\Middleware;

use Coleus\Support\Http\Middleware\HandleInertiaRequests as BaseHandleInertiaRequests;

class HandleInertiaRequests extends BaseHandleInertiaRequests
{
    protected $rootView = 'health::app';
}
