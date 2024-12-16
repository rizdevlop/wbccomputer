<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenggunaController;

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

Route::get('/', function () {
    return view('welcome');
});

// LOG IN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);

// SIGN UP
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'prosesRegist']);

// LOG OUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware(['auth', 'is.admin'])->group(function () {

    // ADMIN DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // ADMIN PROFILE
    Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    // USERS MANAGEMENT
    Route::get('/users-management', [PenggunaController::class, 'index'])->name('usersmanagement.index');
    Route::get('/users/create', [PenggunaController::class, 'create'])->name('users.create');
    Route::post('/users', [PenggunaController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [PenggunaController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [PenggunaController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [PenggunaController::class, 'destroy'])->name('users.destroy');

    // CATEGORY
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // PRODUK MANAGEMENT
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

// ROUTE USER
Route::middleware(['auth', 'is.user'])->group(function () {

    // USER DASHBOARD
    Route::get('/home', [UserController::class, 'index'])->name('user.home');

});