<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PollingUnitController;
use App\Http\Controllers\PollingUnitResultController;
use App\Http\Controllers\LgaController;

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

Route::get('/', [PollingUnitController::class, "index"])->name("polling-units");
Route::get('/all', [PollingUnitController::class, "findAll"])->name("all-units");

Route::get('/polling-unit-result/{polling_unit_uniqueid}', [PollingUnitResultController::class, "findAll"])->name("polling-unit-results");
Route::get('/add-results', [PollingUnitResultController::class, "create"])->name("add-results");
Route::post('/store', [PollingUnitResultController::class, "store"])->name("store");

Route::get('/lgas', [LgaController::class, "index"])->name("lgas");

Route::get('/lga-results/{id}', [LgaController::class, "results"])->name("lga-results");

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
