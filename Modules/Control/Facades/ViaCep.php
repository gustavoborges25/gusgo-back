<?php

namespace Modules\Control\Facades;

use Illuminate\Support\Facades\Facade;

class ViaCep extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Modules\Control\Services\ViaCepService::class;
    }
}
