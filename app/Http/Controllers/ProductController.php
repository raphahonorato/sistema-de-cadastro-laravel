<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity')
        ]);

        return redirect()->back()->with('success', 'Produto criado com sucesso!');
    }

    public function listProducts()
    {
        $products = Product::all(); // Pega todos os produtos
        return view('painel', compact('products')); // Passa a variável $products para a view painel
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id); // Busca o produto pelo ID ou lança uma exceção se não encontrado
        $product->delete(); // Deleta o produto

        return redirect('/')->with('successDelete', 'Produto excluído com sucesso!'); // Redireciona para o painel com uma mensagem de sucesso
    }
}
