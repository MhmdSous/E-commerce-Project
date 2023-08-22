<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
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

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//frontend routes
Route::get('/product/deatails', function () {

    return view('frontend.pages.Details_Product');
})->name('product.details');
Route::get('/add-to-cart', function () {

    return view('frontend.pages.add_to_cart');
})->name('add.to.carts');


Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('delete-cart-item/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/contact_us',[App\Http\Controllers\FrontendController::class, 'contact_us'])->name('contact_us');

Route::get('/home', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
//for products

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/gallery/{id}', [GalleryController::class, 'index'])->name('products.gallery.index');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/all', [ProductController::class, 'getAllProducts'])->name('products.all');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::post('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/excel', [ReportController::class, 'exportExcel'])->name('excel');
    Route::get('/pdf', [ReportController::class, 'exportPDF'])->name('pdf');

    //for categories
    Route::get('categories/all', [CategoryController::class, 'getAllCategories'])->name('categories.all');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/export-excel', [CategoryController::class, 'exportCategoryExcel'])->name('categories.export.excel');
    Route::get('/export-pdf', [ReportController::class, 'exportCategoryPdf'])->name('categories.export.pdf');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //for gallery
    Route::post('/products/gallery/store', [GalleryController::class, 'store'])->name('products.gallery.store');
    // Route::get('/products/gallery/{id}', [GalleryController::class,'index'])->name('products.gallery.all');
});
