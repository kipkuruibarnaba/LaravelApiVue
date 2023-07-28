<?php
namespace App\Http\Controllers\Version2;

namespace App\Http\Controllers\Version2;


use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->prefix("v2")->group(function () {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});
