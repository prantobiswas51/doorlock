<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoorlockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Api\FingerprintController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/transactions', [TransactionController::class, 'store']);
Route::put('/transactions/{id}', [TransactionController::class, 'update']);
Route::get('/transactions/{id}/status', [TransactionController::class, 'status']);

Route::get('/doorlockaccess/{doorlock_id}', [DoorlockController::class, 'accessList']);
Route::get('/doorlocks/status', [DoorlockController::class, 'status']);