<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/entry', [FrontController::class, 'entry'])->name('entry');
Route::post('/entry', [FrontController::class, 'entry'])->name('post');
