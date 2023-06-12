<?php

use App\Http\Controllers\MoviesController;
use App\Models\Movies;
use App\Http\Livewire\Movis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [MoviesController::class, 'index'])->name('movis.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::post('/addmovis', [MoviesController::class, 'store'])->name('movis.store');
    Route::get('/movie/{id}', [MoviesController::class, 'show'])->name('movie.show');
    Route::get('/dashboard', Movis::class)->name('dashboard');
});
