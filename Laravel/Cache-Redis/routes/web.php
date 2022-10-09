<?php

use App\Http\Controllers\RedisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('redis');
})->name('home');

Route::get('/redis-get',[RedisController::class, 'get'])->name('redis_get');
Route::post('/redis-set',[RedisController::class, 'set'])->name('redis_set');
Route::delete('delete/redis/{keyId}',[RedisController::class, 'delete'])->name('redis_delete');

