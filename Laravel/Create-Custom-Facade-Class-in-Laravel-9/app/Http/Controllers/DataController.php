<?php

namespace App\Http\Controllers;

use App\Support\MyFacade;

class DataController extends Controller
{
    public function getSlug()
    {
        $text = "Custom Facade in Laravel 9";

        MyFacade::slugify($text);
    }
}
