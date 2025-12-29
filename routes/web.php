<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\BrewHistoryController;
use App\Models\Method;
use App\Models\Coffee;
use App\Models\Equipment;
use App\Models\BrewHistory;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');


/*
|--------------------------------------------------------------------------
| Authenticated & Verified Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {

        $brewHistories = BrewHistory::with('method')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'coffeeCount'   => Coffee::count(),
            'equipmentCount' => Equipment::count(),
            'methodCount'   => Method::count(),
            'brewHistories' => $brewHistories,
        ]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Coffee Management
    |--------------------------------------------------------------------------
    */
    Route::resource('coffees', CoffeeController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Equipment Management
    |--------------------------------------------------------------------------
    */
    Route::resource('equipments', EquipmentController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Brewing Methods
    |--------------------------------------------------------------------------
    */
    Route::resource('methods', MethodController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Brew Calculator (NO CONTROLLER)
    |--------------------------------------------------------------------------
    */
    Route::get('/brew-calculator', function () {
        return view('calculator', [
            'methods' => \App\Models\Method::orderBy('name')->get()
        ]);
    })->middleware(['auth'])->name('calculator');


    /*
    |--------------------------------------------------------------------------
    | Brew History
    |--------------------------------------------------------------------------
    */
    Route::get('/brew-history', [BrewHistoryController::class, 'index'])
        ->name('brew-history.index');

    Route::post('/brew-history', [BrewHistoryController::class, 'store'])
        ->name('brew-history.store');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
