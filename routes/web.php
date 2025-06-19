<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');


Route::resource('product', ProductController::class);

Route::get('/view_product', [ProductController::class, 'index'])->name('view_product');
Route::get('/products/add', [ProductController::class, 'showAdd'])->name('addproducts');
Route::get('/products/edit/{id}', [ProductController::class, 'showEdit'])->name('editproducts');
Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('product.updates');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('product.delete');
// Route::post('/product/{id}/purchase', [ProductController::class, 'purchase'])->name('product.purchase');
Route::get('/product/image/{id}', [ProductController::class, 'getImage'])->name('product.image');




Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions/submit', [TransactionController::class, 'submit'])->name('transactions.submit');

// Route::get('/productlist', [ProductController::class, 'productlist'])->name('products.customerList');