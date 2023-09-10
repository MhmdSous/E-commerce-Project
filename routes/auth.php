<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

Route::get('/dashboard', [SettingController::class,'index'])->name('dashboard');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
//for products
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

    //for settings
    Route::get('/contact', [SettingController::class, 'ContactFormView'])->name('contactUs');
    Route::post('contact_us/delete/{id}', [SettingController::class, 'ContactFormDelete'])->name('contact_us.delete');
    // for notifications
    Route::get('notifications/delete/{id}', [SettingController::class, 'clearNotification'])->name('admin.notifications.clear');
});



?>
