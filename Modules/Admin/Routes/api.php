<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Api\AdminController;
use Modules\Admin\Http\Controllers\Api\UserController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function (): void {
    Route::group(['prefix' => 'v1', 'as' => 'v1.'], static function (): void {
        // api.admin.v1.accounts.
        Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], static function (): void {
            Route::post('/update/{admin}', [AdminController::class, 'edit'])->name('edit');
            Route::post('/create', [AdminController::class, 'create'])->name('create');
        });
        // api.admin.v1.user.
        Route::group(['prefix' => 'user', 'as' => 'user.'], static function (): void {
            Route::post('/create', [UserController::class, 'create'])->name('create');
            Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
            Route::post('/bulk/create', [UserController::class, 'bulk'])->name('bulk.create');
        });
    });
});
