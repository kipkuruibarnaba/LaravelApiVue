<?php
namespace App\Http\Controllers\Version1;
namespace App\Http\Controllers\Version1;

use Illuminate\Support\Facades\Route;






Route::prefix("v1")->group(function () {

    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);

});
