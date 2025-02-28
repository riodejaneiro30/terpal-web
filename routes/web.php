<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/category', [ProductCategoryController::class, 'index'])->name('productcategory.index'); // Fetch categories
Route::get('/category/create', [ProductCategoryController::class, 'create'])->name('productcategory.create'); // Show create form
Route::post('/category', [ProductCategoryController::class, 'store'])->name('productcategory.store'); // Store new category
Route::get('/category/{category}/edit', [ProductCategoryController::class, 'edit'])->name('productcategory.edit'); // Show edit form
Route::put('/category/{category}', [ProductCategoryController::class, 'update'])->name('productcategory.update'); // Update category
Route::delete('/category/{category}', [ProductCategoryController::class, 'destroy'])->name('productcategory.destroy'); // Delete category
