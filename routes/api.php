<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganismController;
use App\Http\Controllers\SampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [LoginController::class, 'me']);
});
/**
 * Routes for samples
 */
Route::get('/samples', [SampleController::class,'listSamples']);

/**
 * Routes for organisms
 */
Route::post('/new-organisms', [OrganismController::class,'newOrganism']);
Route::get('/organisms', [OrganismController::class,'organisms']);
Route::get('/organisms-top10', [OrganismController::class,'organismsTop10']);



