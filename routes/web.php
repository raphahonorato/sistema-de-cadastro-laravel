<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('painel');
});

Route::post('/createProduct', [ProductController::class, 'createProduct']);


Route::get('/', [ProductController::class, 'listProducts']);

Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('products.deleteProduct');


