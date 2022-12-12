<?php

use App\Http\Controllers\General\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\TestController;
use App\Http\Controllers\Auth\CompanyController;
use App\Http\Controllers\Auth\InputTestResultController;
use App\Http\Controllers\Auth\ReportController;
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
        Route::get('/getUserByCompaniesId', [UserController::class, 'getUserByCompaniesId'])->name('auth.user.getUserByCompaniesId');
        Route::get('/', [UserController::class, 'index'])->name('auth.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('auth.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('auth.user.store');
        Route::get('/{id}/detail', [UserController::class, 'show'])->name('auth.user.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('auth.user.edit');
        Route::post('/{id}/update', [UserController::class, 'update'])->name('auth.user.update');
    });
    Route::group(['prefix' => '/input-test-result'], function(){
        Route::get('/ist', [InputTestResultController::class, 'indexIst'])->name('auth.inputResultTest.ist.index');
        Route::get('/ist/create', [InputTestResultController::class, 'createIst'])->name('auth.inputResultTest.ist.create');
        Route::post('/ist/store', [InputTestResultController::class, 'storeIst'])->name('auth.inputResultTest.ist.store');
        Route::get('/ist/{id}', [InputTestResultController::class, 'showIst'])->name('auth.inputResultTest.ist.show');
        Route::post('/ist/delete', [InputTestResultController::class, 'deleteIst'])->name('auth.inputResultTest.ist.delete');

        Route::get('/16pf', [InputTestResultController::class, 'index16pf'])->name('auth.inputResultTest.16pf.index');
        Route::get('/16pf/create', [InputTestResultController::class, 'create16pf'])->name('auth.inputResultTest.16pf.create');
        Route::post('/16pf/store', [InputTestResultController::class, 'store16pf'])->name('auth.inputResultTest.16pf.store');
        Route::get('/16pf/{id}', [InputTestResultController::class, 'show16pf'])->name('auth.inputResultTest.16pf.show');
        Route::post('/16pf/delete', [InputTestResultController::class, 'delete16pf'])->name('auth.inputResultTest.16pf.delete');

        Route::get('/disc', [InputTestResultController::class, 'indexDisc'])->name('auth.inputResultTest.disc.index');
        Route::get('/disc/create', [InputTestResultController::class, 'createDisc'])->name('auth.inputResultTest.disc.create');
        Route::post('/disc/store', [InputTestResultController::class, 'storeDisc'])->name('auth.inputResultTest.disc.store');
        Route::get('/disc/{id}', [InputTestResultController::class, 'showDisc'])->name('auth.inputResultTest.disc.show');
        Route::post('/disc/delete', [InputTestResultController::class, 'deleteDisc'])->name('auth.inputResultTest.disc.delete');

        Route::get('/v-kraepelin', [InputTestResultController::class, 'indexVKraepelin'])->name('auth.inputResultTest.vKraepelin.index');
        Route::get('/v-kraepelin/create', [InputTestResultController::class, 'createVKraepelin'])->name('auth.inputResultTest.vKraepelin.create');
        Route::post('/v-kraepelin/store', [InputTestResultController::class, 'storeVKraepelin'])->name('auth.inputResultTest.vKraepelin.store');
        Route::get('/v-kraepelin/{id}', [InputTestResultController::class, 'showVKraepelin'])->name('auth.inputResultTest.vKraepelin.show');
        Route::post('/v-kraepelin/delete', [InputTestResultController::class, 'deleteVKraepelin'])->name('auth.inputResultTest.vKraepelin.delete');
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
    Route::group(['prefix' => '/report'], function () {
        Route::get('/result', [ReportController::class, 'indexResult'])->name('auth.report.result.index');
        Route::get('/result/pdf/{id}/download', [ReportController::class, 'createPdf'])->name('auth.report.result.pdf.download');
        Route::get('/result/pdf/{id}/view', [ReportController::class, 'viewPdf'])->name('auth.report.result.pdf.view');
    });
});
