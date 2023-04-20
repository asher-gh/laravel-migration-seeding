<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Models\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::resource('movies', MovieController::class);

Route::get('/api_token', function (Request $request) {

    return $request->user()->createToken('mobile')->plainTextToken;

});

Route::post('/calculator', [CalculatorController::class, 'calculate'])->name('calculator.calculate');

/**
 * Routes only available to authenticated users
 */
Route::middleware('auth')->group(
    function () {
        Route::resource('collections', CollectionController::class);
        
        Route::post('collections/{collection}/movies', [CollectionController::class, 'addMovie'])
            ->name('collections.movies.store');


        Route::get('somereport/{collection}', [CollectionController::class, 'getReport'])
            ->can('update', 'collection')
            ->name('collections.report');

    }
);



Route::get(
    '/dashboard', function () {
        return Inertia::render('Dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);

require __DIR__.'/auth.php';
