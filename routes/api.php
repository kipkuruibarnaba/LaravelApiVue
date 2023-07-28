<?php
namespace App\Http\Controllers;
use App\Http\Controllers\TokenAuth\LoginController;
use App\Http\Controllers\TokenAuth\LogoutController;
use App\Http\Controllers\TokenAuth\RegisterController;
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

require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';


// Route::middleware('auth:sanctum')->prefix("v1")->group(function(){

//     Route::apiResource('/tasks', TaskController::class);
//     Route::patch('/tasks/{task}/complete',CompleteTaskController::class);

// });

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    Route::post('/register', RegisterController::class);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
