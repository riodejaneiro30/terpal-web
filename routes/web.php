<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Menu\MenuRoleController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Menu\RoleController;
use Illuminate\Support\Facades\Route;

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('productcategory.index'); // Fetch product categories
Route::get('/product-category/create', [ProductCategoryController::class, 'create'])->name('productcategory.create'); // Show create form
Route::post('/product-category', [ProductCategoryController::class, 'store'])->name('productcategory.store'); // Store new product category
Route::get('/product-category/{category}/edit', [ProductCategoryController::class, 'edit'])->name('productcategory.edit'); // Show edit product category
Route::put('/product-category/{category}', [ProductCategoryController::class, 'update'])->name('productcategory.update'); // Update product category
Route::delete('/product-category/{category}', [ProductCategoryController::class, 'destroy'])->name('productcategory.destroy'); // Delete product category

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create'); // Show create form
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store'); // Store new menu
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit'); // Show edit form
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update'); // Update menu
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy'); // Delete menu

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create'); // Show create form
Route::post('/role', [RoleController::class, 'store'])->name('role.store'); // Store new role
Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit'); // Show edit form
Route::put('/role/{role}', [RoleController::class, 'update'])->name('role.update'); // Update menu
Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy'); // Delete menu

Route::get('/menu-role', [MenuRoleController::class, 'index'])->name('menurole.index');
Route::get('/menu-role/{role}/edit', [MenuRoleController::class, 'edit'])->name('menurole.edit');
Route::post('/menu-role/{role_id}', [MenuRoleController::class, 'store'])->name('menurole.store');
Route::delete('/menu-role/{role_id}/{menu_id}', [MenuRoleController::class, 'destroy'])->name('menurole.destroy');