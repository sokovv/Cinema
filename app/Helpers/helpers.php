<?php

use Illuminate\Support\Facades\Route;

class Utils
{
    public static function getActiveLink(string $name, string $class = 'active'): string
    {
        return Route::is($name) ? $class : '';
    }

}



