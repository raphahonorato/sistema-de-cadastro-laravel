<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function(){
    return view('home');
});

Route::get('/products', [ProductController::class, 'listProducts'])->name('products.list');

Route::match(['GET', 'POST'], '/products/create', [ProductController::class, 'createProduct'])->name('products.create');

Route::match(['GET', 'POST', 'PUT', 'PATCH'], '/products/{product}/edit', [ProductController::class, 'updateProduct'])->name('products.edit');

Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');