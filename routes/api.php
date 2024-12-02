<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

use App\Http\Controllers\RegionController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\WoredaController;

Route::middleware('auth:api')->group(function () {
    // Region routes
    Route::apiResource('regions', RegionController::class);

    // Zone routes (nested under a specific region)
    Route::apiResource('regions/{regionId}/zones', ZoneController::class);

    // Woreda routes (nested under a specific zone)
    Route::apiResource('zones/{zoneId}/woredas', WoredaController::class);
});

