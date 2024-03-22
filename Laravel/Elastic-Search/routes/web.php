<?php

use App\Repositories\Interfaces\ArticlesRepositoryInterface;
use App\Repositories\Interfaces\SearchRepositoryInterface;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('/dashboard', function (SearchRepositoryInterface $searchRepository) {
    return view('dashboard', [
        'articles' => request()->has('q')
            ? $searchRepository->search(request('q'))
            : App\Models\Article::all(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
