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
        $products = Product::all(); 
        return view('painel', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete(); 

        return redirect('/')->with('successDelete', 'Produto excluído com sucesso!'); 
    }
}
