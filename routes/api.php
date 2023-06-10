<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ApiPropertyController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ImagesController;
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
*/
//puclic routes
Route::get('properties', [ApiPropertyController::class, 'index']);
//Route::get('property/{id}', [ApiPropertyController::class, 'show']);
//Route::post('property', [ApiPropertyController::class, 'store']);
//Route::put('property/{id}', [ApiPropertyController::class, 'update']);
//Route::delete('property/{id}', [ApiPropertyController::class, 'delete']);
Route::post('agent', [AgentController::class, 'store']);
Route::get('agents', [AgentController::class, 'index']);
//Route::get('agent/{id}', [AgentController::class, 'show']);

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');


Route::post('register', [ApiUserController::class, 'register']);
Route::post('login', [ApiUserController::class, 'login']);

Route::get('user', [ApiPropertyController::class, 'show']);


//protected routes
Route:: group (['middleware'=>['auth:sanctum']],
 function () {
    Route::get('agent/{id}', [AgentController::class, 'show']);
    Route::put('property/{id}', [ApiPropertyController::class, 'update']);
    Route::delete('property/{id}', [ApiPropertyController::class, 'delete']);
    Route::get('property/{id}', [ApiPropertyController::class, 'show']);
    Route::post('property', [ApiPropertyController::class, 'store']);
    Route::get('user/{id}', [ApiUserController::class, 'show']);
    Route::put('user/{id}', [ApiUserController::class, 'update']);
    Route::delete('user/{id}', [ApiUserController::class, 'delete']);

    
    Route::post('logout',[ApiUserController::class,'logout']);
    }
);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
