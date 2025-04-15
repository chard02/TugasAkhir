<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Admin\ResearcherController;
use App\Http\Controllers\Buyer\BuyerController;


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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});

// 🔹 Admin - Researcher
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/admin/create-researcher', [ResearcherController::class, 'registerResearcher']);
});

// 🔹 Researcher
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/researcher/update-profile', [ResearcherController::class, 'updateProfile']);
});

// 🔹 Buyer
Route::prefix('buyer')->group(function () {
    Route::post('/register', [BuyerController::class, 'registerBuyer']);
    Route::post('/login', [BuyerController::class, 'loginBuyer']);
    Route::post('/logout', [BuyerController::class, 'logoutBuyer'])->middleware('auth:sanctum');
});