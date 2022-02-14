<?php

use App\Http\Controllers\CardInformationController;
use App\Http\Controllers\DepositToOthersController;
use App\Http\Controllers\TransactionsController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('users/{user_id}/deposit-to-others/{track_id}', [DepositToOthersController::class, "deposit"]);
    Route::post('users/{user_id}/card-information', [CardInformationController::class, "setCardInformation"]);
    Route::get('users/{user_id}/transactions', [TransactionsController::class, "index"]);
});
