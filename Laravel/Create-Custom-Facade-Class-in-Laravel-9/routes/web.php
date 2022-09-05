<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Support\MyFacade;

// if you want you can do it by creating a Closure route
Route::get('custom-slug-route', function () {
    $text = "Custom Facade in Laravel 9";

    MyFacade::slugify($text);

});

// or you can do it In Controllers
Route::get("custom-slug-controller", [DataController::class, "getSlug"]);
