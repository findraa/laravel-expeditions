<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'access-log'], function () {
    Route::get('/', [FrontController::class, "index"])->name('index');
});

Route::get('/user-tracking', [FrontController::class, "tracking"])->name('front.tracking');
Route::get('/check-tracking', [FrontController::class, "checkTracking"])->name('check.tracking');

Route::get('/user-shipping', [FrontController::class, "shipping"])->name('front.shipping');
Route::get('/check-shipping', [FrontController::class, "checkShipping"])->name('check.shipping');

Route::get('/cost', [FrontController::class, "cost"])->name('front.cost');
Route::post('/cost', [FrontController::class, "checkCost"])->name('front.check_cost');

Route::get('/contact', [FrontController::class, "contact"])->name('front.contact');
Route::post('/contact', [FrontController::class, "sendMessage"])->name('front.send_message');

Route::get('/invoice/print/{transactionId}', [TransactionController::class, "print"])->name('invoice.print');

Route::get('/confirm', [FrontController::class, "confirm"])->name('front.confirm');
Route::get('/confirm/{tracking_number}', [FrontController::class, "confirmStatus"]);

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, "index_view"])->name('dashboard');
    Route::get('/home', [HomeController::class, "index_view"])->name('home');
    Route::get('/message', [MessageController::class, "index_view"])->name('message');

    Route::get('/user', [UserController::class, "index_view"])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('/expedition', [ExpeditionController::class, "index_view"])->name('expedition');
    Route::view('/expedition/new', "pages.expedition.expedition-new")->name('expedition.new');
    Route::view('/expedition/edit/{expeditionId}', "pages.expedition.expedition-edit")->name('expedition.edit');

    Route::get('/area', [AreaController::class, "index_view"])->name('area');
    Route::view('/area/new', "pages.area.area-new")->name('area.new');
    Route::view('/area/edit/{areaId}', "pages.area.area-edit")->name('area.edit');

    Route::get('/transaction', [TransactionController::class, "index_view"])->name('transaction');
    Route::view('/transaction/new', "pages.transaction.transaction-new")->name('transaction.new');
    Route::view('/transaction/edit/{transactionId}', "pages.transaction.transaction-edit")->name('transaction.edit');
    Route::get('/invoice/{transactionId}', [TransactionController::class, "invoice"])->name('invoice.view');


    Route::get('/tracking', [TrackingController::class, "index_view"])->name('tracking');
    Route::view('/tracking/new', "pages.tracking.tracking-new")->name('tracking.new');
    Route::get('/tracking/{tracking_number}', [TrackingController::class, "tracking"])->name('tracking.view');

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/transaction', [TransactionController::class, "transactionReport"])->name('report.transaction');
        Route::get('/transaction/pdf', [TransactionController::class, "transactionReportPdf"])->name('report.transaction_pdf');
    });
});
