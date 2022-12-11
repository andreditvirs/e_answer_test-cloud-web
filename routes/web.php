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
    Route::group(['prefix' => '/test'], function () {
        Route::get('/list', [TestController::class, 'indexList'])->name('auth.test.list');
        Route::get('/input', [TestController::class, 'indexInput'])->name('auth.test.input');
        Route::get('/output', [TestController::class, 'indexOutput'])->name('auth.test.output');
        Route::get('/input/answers', [TestController::class, 'indexInputAnswers'])->name('auth.test.input.answers');
        Route::post('/input/answer/temp', [TestController::class, 'storeAnswerToTemp'])->name('auth.test.input.answer.to.temp');
        Route::post('/input/to/temp', [TestController::class, 'storeInputToTemp'])->name('auth.test.store.to.temp');
        Route::get('/input/to/temp/delete', [TestController::class, 'destroyInputInTemp'])->name('auth.test.delete.temp');
        Route::post('/input/to/database', [TestController::class, 'storeInputToDatabase'])->name('auth.test.store.to.database');
    });
});
