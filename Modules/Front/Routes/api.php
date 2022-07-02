<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\Api\UserReservationController;

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
Route::group(['as' => 'api.'], static function (): void {
    Route::group(['prefix' => 'v1', 'as' => 'v1.'], static function (): void {
        // api.v1.menu.
        Route::group(['prefix' => 'menu', 'as' => 'menu.'], static function (): void {
            Route::post('/reservation/{menu}', [UserReservationController::class, 'reservation'])->name('reservation');
            Route::post('/reservation/cancel/{menu}', [UserReservationController::class, 'cancel'])->name('reservation.cancel');
        });
    });
});
