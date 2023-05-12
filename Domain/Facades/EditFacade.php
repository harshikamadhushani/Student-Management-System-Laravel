<?php
namespace Domain\Facades;

use Domain\Services\EditService;
use Illuminate\Support\Facades\Facade;

class EditFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return EditService::class;
    }


}
