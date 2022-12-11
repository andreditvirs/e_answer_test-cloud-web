<?php

use App\Http\Controllers\General\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\TestController;
use App\Http\Controllers\Auth\CompanyController;
use App\Http\Controllers\Auth\UserController;
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
    Route::group(['prefix' => '/company'], function(){
        Route::get('/', [CompanyController::class, 'index'])->name('auth.company.index');
        Route::get('/create', [CompanyController::class, 'create'])->name('auth.company.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('auth.company.store');
        Route::get('/{id}/detail', [CompanyController::class, 'show'])->name('auth.company.show');
        Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('auth.company.edit');
        Route::post('/{id}/update', [CompanyController::class, 'update'])->name('auth.company.update');
    });
    Route::group(['prefix' => '/user'], function(){
        Route::get('/', [UserController::class, 'index'])->name('auth.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('auth.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('auth.user.store');
        Route::get('/{id}/detail', [UserController::class, 'show'])->name('auth.user.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('auth.user.edit');
        Route::post('/{id}/update', [UserController::class, 'update'])->name('auth.user.update');
    });
    Route::group(['prefix' => '/test'], function () {
        Route::get('/list', [TestController::class, 'indexList'])->name('auth.test.list');
        Route::get('/input', [TestController::class, 'indexInput'])->name('auth.test.input');
        Route::get('/output', [TestController::class, 'indexOutput'])->name('auth.test.output');
        Route::get('/output/answers/{id}', [TestController::class, 'indexOutputAnswers'])->name('auth.test.output.answers');
        Route::get('/output/answers/{id}/edit', [TestController::class, 'editOutputAnswers'])->name('auth.test.output.answers.edit');
        Route::post('/output/answers/{id}/edit', [TestController::class, 'updateInputToDatabase'])->name('auth.test.output.answers.update');
        Route::post('/output/answers/delete', [TestController::class, 'destroyOutputInDatabase'])->name('auth.test.output.answers.delete');
        Route::get('/input/answers', [TestController::class, 'indexInputAnswers'])->name('auth.test.input.answers');
        Route::post('/input/answer/temp', [TestController::class, 'storeAnswerToTemp'])->name('auth.test.input.answer.to.temp');
        Route::post('/input/to/temp', [TestController::class, 'storeInputToTemp'])->name('auth.test.store.to.temp');
        Route::get('/input/to/temp/delete', [TestController::class, 'destroyInputInTemp'])->name('auth.test.delete.temp');
        Route::post('/input/to/database', [TestController::class, 'storeInputToDatabase'])->name('auth.test.store.to.database');
    });
});
