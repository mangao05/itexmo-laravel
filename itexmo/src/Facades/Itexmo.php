<?php

namespace Mangao05\Itexmo\Facades;

use Illuminate\Support\Facades\Facade;

class Itexmo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "mangao05-itexmo";
    }
}