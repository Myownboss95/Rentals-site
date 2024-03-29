<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EmailVerifiedController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogoutController;
// use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SuccessfulPasswordResetController;
use App\Http\Controllers\TwoFactorAuthenticationController;
use App\Http\Controllers\User\WishlistController;
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

// Route::as('front.')->group(function () {
//     Route::get('/', function () {
//         return inertia('index');
//     })->name('index');
// });

// Route::get('/product/{slug}', ProductController::class, 'show')->name('shop.show');
Route::get('404', function () {
    return view('errors.404');
})->name('404');
Route::middleware(['auth'])->group(function () {

    Route::get('add-to-wishlist/{slug}', [WishlistController::class, 'store'])->name('add-to-wishlist');

    Route::middleware(['verified'])->group(function () {
        Route::prefix('user')->as('user.')->middleware('can:is_user')->group(fn() => require_once ('user.php'));
        Route::prefix('admin')->as('admin.')->middleware('can:is_admin')->group(fn() => require_once ('admin.php'));

        Route::get('change-password', [ChangePasswordController::class, 'getChangePasswordView'])->name('password.change');
        Route::post('change-password', [ChangePasswordController::class, 'ChangePassword']);

        Route::get('two-factor-auth', TwoFactorAuthenticationController::class)->name('two-factor-auth');

        Route::get('email/verified', [EmailVerifiedController::class, 'verified'])->name('email.verified');
    });

    Route::post('login-as/{user}', [UserController::class, 'loginAs'])->name('login-as');
    Route::post('switch-to-admin/{user}', [UserController::class, 'switchToAdmin'])->name('switch-to-admin');

    Route::post('email/correct', [EmailVerifiedController::class, 'correctInfo'])->name('email.correct');

    Route::prefix('location')->as('location.')->controller(LocationController::class)->group(function () {
        Route::get('countries', 'countries')->name('countries');
        Route::get('states/{country}', 'states')->name('states');
    });
});

Route::middleware('guest')->group(function () {

    Route::get('logout', LogoutController::class);
    Route::get('reset-password', SuccessfulPasswordResetController::class)->name('password.reset.successful');
});

Route::get('/ref/{token}', [ReferralController::class, 'check']);

Route::match(['get', 'post'], 'set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');

// Route::get('/categories/{slug}', ShopController::class, 'showCategory')->name('category.show');
Route::controller(ShopController::class)->group(function () {
    Route::get('/shop/{slug}', "show")->name('shop.show');
    Route::get('/shop', "index")->name('shop.index');
    Route::get('/shop/categories/{slug}', "index")->name('shop.categories');
    Route::get('/products/search', "search")->name('search');
});

// Route::controller(CartController::class)->group(function () {
//     Route::get('/cart', "index")->name('cart.index');
//     Route::post('/store/add-to-cart', "addToCart")->name('cart.store');

// });
Route::controller(FrontendController::class)->group(function () {
    $theme = config('app.theme', 'front2');
    Route::get('/', "home")->name('front.index');
    Route::get('/about-us', "about");
    Route::get('/contact-us', "contact")->name('front.contact');
    Route::get('/terms-and-conditions', "terms_and_conditions");
    Route::get('/faqs', "faqs");
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');

Route::post('/update-cart', [CartController::class, 'update'])->name('update.cart');

Route::delete('/remove-from-cart', [CartController::class, 'remove'])->middleware('auth')->name('remove.from.cart');
