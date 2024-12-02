<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\WoredaController;



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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // Region Routes
    Route::get('regions', [RegionController::class, 'index'])->name('regions.index');
    Route::get('regions/create', [RegionController::class, 'create'])->name('regions.create');
    Route::post('regions', [RegionController::class, 'store'])->name('regions.store');
    Route::get('regions/{region}', [RegionController::class, 'show'])->name('regions.show');
    Route::get('regions/{region}/edit', [RegionController::class, 'edit'])->name('regions.edit');
    Route::put('regions/{region}', [RegionController::class, 'update'])->name('regions.update');
    Route::delete('regions/{region}', [RegionController::class, 'destroy'])->name('regions.destroy');

    // Zone Routes (nested under Region)
    Route::get('regions/{region}/zones', [ZoneController::class, 'index'])->name('zones.index');
    Route::get('regions/{region}/zones/create', [ZoneController::class, 'create'])->name('zones.create');
    Route::post('regions/{region}/zones', [ZoneController::class, 'store'])->name('zones.store');
    Route::get('zones/{zone}', [ZoneController::class, 'show'])->name('zones.show');
    Route::get('zones/{zone}/edit', [ZoneController::class, 'edit'])->name('zones.edit');
    Route::put('zones/{zone}', [ZoneController::class, 'update'])->name('zones.update');
    Route::delete('zones/{zone}', [ZoneController::class, 'destroy'])->name('zones.destroy');

    // Woreda Routes (nested under Zone)
    Route::get('zones/{zone}/woredas', [WoredaController::class, 'index'])->name('woredas.index');
    Route::get('zones/{zone}/woredas/create', [WoredaController::class, 'create'])->name('woredas.create');
    Route::post('zones/{zone}/woredas', [WoredaController::class, 'store'])->name('woredas.store');
    Route::get('woredas/{woreda}', [WoredaController::class, 'show'])->name('woredas.show');
    Route::get('woredas/{woreda}/edit', [WoredaController::class, 'edit'])->name('woredas.edit');
    Route::put('woredas/{woreda}', [WoredaController::class, 'update'])->name('woredas.update');
    Route::delete('woredas/{woreda}', [WoredaController::class, 'destroy'])->name('woredas.destroy');
});