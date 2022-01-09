<?php

use App\Http\Controllers\MeController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', MeController::class);
});

Route::get('/user/{user_id}/tasks', [TaskController::class, 'index']);
Route::post('/user/{user_id}/tasks', [TaskController::class, 'store']);
Route::put('/user/{user_id}/tasks/{task_id}', [TaskController::class, 'update']);
Route::delete('/user/{user_id}/tasks/{task_id}', [TaskController::class, 'destroy']);
