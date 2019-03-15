<?php

namespace Modules\Control\Facades;

use Illuminate\Support\Facades\Facade;

class IRS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Modules\Control\Services\IRSService::class;
    }
}
