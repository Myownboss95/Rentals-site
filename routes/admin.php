<?php

use App\Models\Withdrawal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BotController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TradeableController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\TagController;

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

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::as('users.')->prefix('users')
->controller(UserController::class)->group(function () {
        Route::get('', 'index')->name('index');
    });

Route::prefix('mail')->as('mail.')->controller(MailController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('send', 'send')->name('send');
});

Route::resource('tradeables', TradeableController::class);
Route::resource('plans', PlanController::class)->except('show');

Route::resource('trades', TradeController::class)->except('show', 'destroy', 'edit');
Route::post('trades/close/{trade}', [TradeController::class, 'close'])->name('trades.close');
Route::resource('bots', BotController::class)->except('show');
Route::get('bots/activations', [BotController::class, 'showBotActivationRequest'])->name('bots.activation.requests');
Route::post('bots/activations/{id}', [BotController::class, 'generateBotActivationToken'])->name('bots.activation.token-generate');

Route::resource('tradeables', TradeableController::class);
Route::resource('tags', TagController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('settings', SettingController::class);
Route::resource('payment-method', PaymentMethodController::class);
Route::resource('deposits', DepositController::class)->only('index');

Route::get('deposits/approve/{id}', [DepositController::class, 'approve'])->name('deposits.approve');
Route::get('deposits/decline/{id}', [DepositController::class, 'decline'])->name('deposits.decline');

Route::resource('withdrawals', WithdrawalController::class);
Route::post('withdrawals/approve/{id}', [WithdrawalController::class, 'approve'])->name('withdrawals.approve');
Route::post('withdrawals/decline/{id}', [WithdrawalController::class, 'decline'])->name('withdrawals.decline');

Route::as('kyc.')->prefix('kyc')->controller(KycController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('approve/{user}', 'approve')->name('approve');
    Route::post('decline/{user}', 'decline')->name('decline');
});
