<?php
use App\Http\Controllers\ApiPropertyController;
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

Route::get('properties', [ApiPropertyController::class, 'index']);
Route::get('property/{$id}', [ApiPropertyController::class, 'show']);
Route::post('properties', [ApiPropertyController::class, 'store']);
Route::put('property/{$id}', [ApiPropertyController::class, 'update']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
