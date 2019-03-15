<?php

namespace Modules\Control\Facades;

use Illuminate\Support\Facades\Facade;

class Ibge extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Modules\Control\Services\IbgeService::class;
    }
}
