<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/add-queue', [Controller::class, 'addToQueue']);
Route::get('/queue-flush', [Controller::class, 'queueFlush']);

