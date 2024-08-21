<?php

namespace Techfy\GotYourLogs;

use Illuminate\Support\Facades\Facade;

class LogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'gotyourlogs';
    }
}
