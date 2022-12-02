<?php

use App\Http\Controllers\General\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'index'])->name('general.auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('general.auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('general.auth.logout');

Route::group(['prefix' => '/','middleware' => 'auth:web'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.dashboard.index');
    Route::get('/test/answer-papers', [TestController::class, 'indexAnswerPapers'])->name('auth.test.answerPapers');
});
