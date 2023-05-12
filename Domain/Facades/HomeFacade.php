<?php
namespace Domain\Facades;

use Domain\Services\HomeService;
use Illuminate\Support\Facades\Facade;

class HomeFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return HomeService::class;
    }


}
