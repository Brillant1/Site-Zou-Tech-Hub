<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ConatctController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('actualites', ActualiteController::class)->except('update');
Route::post('actualites/update', [ActualiteController::class, 'update']);

Route::apiResource('expertises', ExpertiseController::class)->except('update');
Route::post('expertises/update', [ExpertiseController::class, 'update']);

Route::apiResource('formations', FormationController::class)->except('update');

Route::post('formations/update', [FormationController::class, 'update']);

Route::apiResource('offres', OffreController::class)->except('update');
Route::post('offres/update', [OffreController::class, 'update']);

Route::apiResource('messages', ContactController::class);

Route::apiResource('subscribes', SubscribeController::class)->except('update');
Route::post('subscribes/update', [SubscribeController::class, 'update']);

Route::apiResource('medias', MediaController::class);


Route::get('home_data', [HomeController::class, 'index']);


Route::post('abonnement', [AbonnementController::class, 'store']);

// Authentication routes
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
