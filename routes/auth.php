<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware('auth')->group(function () {

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/gallery/{id}',[GalleryController::class,'index'])->name('products.gallery.index');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/products/all',[ProductController::class,'getAllProducts'])->name('products.all');
Route::post('products/store',[ProductController::class,'store'])->name('products.store');
Route::post('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/excel', [ReportController::class,'exportExcel'])->name('excel');
Route::get('/pdf', [ReportController::class,'exportPDF'])->name('pdf');
Route::get('/products/gallery/store', [GalleryController::class,'store'])->name('products.gallery.store');


//for categories
Route::get('categories/all',[CategoryController::class,'getAllCategories'])->name('categories.all');
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/export-excel', [CategoryController::class,'exportCategoryExcel'])->name('categories.export.excel');
Route::get('/export-pdf', [ReportController::class,'exportCategoryPdf'])->name('categories.export.pdf');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

?>
