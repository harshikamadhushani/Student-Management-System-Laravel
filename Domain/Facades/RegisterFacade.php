<?php
namespace Domain\Facades;

use Domain\Services\RegisterService;
use Illuminate\Support\Facades\Facade;

class RegisterFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return RegisterService::class;
    }


}

