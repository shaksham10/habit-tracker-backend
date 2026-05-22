<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HabitController;

use App\Http\Controllers\Api\SettingController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working'
    ]);
});

Route::get('/habits', [HabitController::class, 'index']);

Route::post('/habits', [HabitController::class, 'store']);

Route::delete('/habits/{habit}', [HabitController::class, 'destroy']);

Route::get(
    '/settings',
    [SettingController::class, 'index']
);

Route::post(
    '/settings',
    [SettingController::class, 'update']
);