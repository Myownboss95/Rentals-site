<?php

use App\Http\Controllers\User\BotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\OnboardController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\WithdrawalController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| testing ->middleware('active')
*/

Route::middleware('onboarded')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/rented-products', [DashboardController::class, 'my_rented_products'])->name('rented_products');
    Route::get('/expired-products', [DashboardController::class, 'my_expired_products'])->name('expired_products');
    Route::get('/my-orders', [DashboardController::class, 'my_orders'])->name('orders');
    Route::get('/refund-product/{id}', [DashboardController::class, 'return_product'])->name('return_product');
    Route::post('deposits/validate', [DepositController::class, 'validateDeposit'])->name('deposits.validate');
    Route::resource('deposits', DepositController::class)->except('show');
    Route::get('/profile/view',[ProfileController::class, 'index'])->name('profile.view');
    Route::resource('profile', ProfileController::class);
    Route::resource('withdrawals', WithdrawalController::class);

    Route::get('/trades/assets/{type}',[TradeController::class, 'getTradeables'])->name('trades.getTradeables');
    Route::get('/trades/view',[TradeController::class, 'trades'])->name('trades.view');
    Route::post('trades/close/{trade}', [TradeController::class, 'close'])->name('trades.close')->middleware('active');
    Route::resource('trades', TradeController::class)->only('index', 'store');
    Route::post('bots/activation-request', [BotController::class, 'requestActivation'])->name('bots.activation.request');
    Route::post('bots/activate', [BotController::class, 'activate'])->name('bots.activate');
    Route::post('bots/deactivate/{id}', [BotController::class, 'deactivate'])->name('bots.deactivate');
    Route::post('bots/reactivate/{id}', [BotController::class, 'reactivate'])->name('bots.reactivate');
    Route::resource('bots', BotController::class)->except('show', 'update');
});

Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::delete('wishlist/destroy/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
Route::get('subscriptions', [SubscriptionController::class, 'plans'])->name('subscriptions.plans');
Route::post('subscribe/{plan}', [SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe');

Route::post('account-pay', [PaymentController::class, 'pay_via_account_funds'])->name('account.payment');
Route::post('pay', [PaymentController::class, 'redirectToGateway'])->name('payment');
Route::get('payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');

Route::prefix('onboard')->name('onboard.')->group(function () {
    Route::get('', [OnboardController::class, 'onboardPage']);
    Route::post('', [OnboardController::class, 'submitAddress'])->name('address');

    Route::get('upload', [OnboardController::class, 'uploadPage']);
    Route::post('upload', [OnboardController::class, 'upload'])->name('upload');
});
