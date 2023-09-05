<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'home');
Route::get('/home', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');

//frontend routes
Route::get('/product/deatails/{id}', [FrontendController::class, 'show'])->name('product.details');
Route::get('/add-to-cart', function () {

    return view('frontend.pages.add_to_cart');
})->name('add.to.carts');

//for cart
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('cart/restore/{id}', [CartController::class, 'restore'])->name('cart.restore');
Route::post('delete-cart-item/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/add-multiple-to-cart', [CartController::class, 'addMultipleToCart'])->name('add.multiple.to.cart');
Route::get('/cart-history', [CartController::class, 'cartHistory'])->name('cart.history');
Route::post('/force-delete/{id}', [CartController::class, 'ForceDeleteCartItem'])->name('force.delete');
//for settings
Route::get('/contact_us', [SettingController::class, 'ContactForm'])->name('contact_us');
Route::post('/contact_us/submit', [App\Http\Controllers\SettingController::class, 'ContactFormSubmit'])->name('contact_us.submit');

// for favorites
Route::get('/add-to-favorite/{id}', [FavoriteController::class, 'addToFavorite'])->name('add.to.favorite');
Route::get('/favorite/view', [FavoriteController::class, 'viewFavorite'])->name('favorite.view');
Route::get('/delete-fav-item/{id}', [FavoriteController::class, 'removeFromFavorite'])->name('favorite.remove');


// for payment
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
Route::post('/singel-charge', [CheckoutController::class, 'store'])->name('payment.charge');
Route::post('/update-cart-quantity', [CartController::class, 'updateCartQuantity'])->name('update.cart.quantity');

// create route to go to payment form
Route::get('/payment/{order_id}', [PaymentsController::class, 'create'])->name('payment.create');
Route::post('orders/{order}/stripe/paymeny-intent', [PaymentsController::class, 'createStripePaymentIntent'])
    ->name('stripe.paymentIntent.create');

Route::get('orders/{order}/pay/stripe/callback', [PaymentsController::class, 'confirm'])
    ->name('stripe.return');
require __DIR__ . '/auth.php';
