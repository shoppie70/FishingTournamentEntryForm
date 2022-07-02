<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Admin\Http\Controllers\ReservationController;
use Modules\Admin\Http\Controllers\SystemController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::middleware('auth:admins')->group(static function (): void {
        Route::get('/', [ReservationController::class, 'calendar'])->name('index');

        // admin.profile.
        Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], static function (): void {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::get('/{admin}', [AdminController::class, 'edit'])->name('edit');
        });

        // admin.system.
        Route::group(['prefix' => 'system', 'as' => 'system.'], static function (): void {
            Route::get('/phpmyadmin', [SystemController::class, 'phpmyadmin'])->name('phpmyadmin');
            Route::get('/artisan', [SystemController::class, 'artisan'])->name('artisan');
            Route::post('/artisan/run', [SystemController::class, 'run'])->name('artisan.run');
        });
    });
});
