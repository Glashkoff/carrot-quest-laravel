<?php namespace professionalweb\CarrotQuest\Facades;

use Illuminate\Support\Facades\Facade;
use professionalweb\CarrotQuest\Services\CarrotQuest as CarrotQuestService;

class CarrotQuest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CarrotQuestService::class;
    }
}