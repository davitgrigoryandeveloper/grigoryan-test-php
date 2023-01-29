<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('/post', PostController::class);
Route::match(['PUT', 'PATCH'], 'post/{post}/state-transit', [PostController::class, 'stateTransit'])
    ->name('post.state-transit');


