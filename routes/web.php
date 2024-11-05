<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function(){
    return view('painel');
});



Route::get('/products', [ProductController::class, 'listProducts'])->name('products.list'); // Lista os produtos


Route::match(['GET','POST'],'/products/create', [ProductController::class, 'createProduct'])->name('products.create'); // Cria um produto

Route::match(['GET','POST'],'/products/{product}/edit', [ProductController::class, 'updateProduct'])->name('products.edit'); // Cria um produto
// Route::put('/products/{id}', [ProductController::class, 'updateProduct'])->name('products.update'); // Atualiza um produto

Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete'); // Exclui um produto


