<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        $request->method();

        if ($request->isMethod('post')) {
            Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity')
            ]);

            return redirect()->route('products.list');
        }

        return view('Products/create');
    }

    public function listProducts()
    {
        $products = Product::all();
        return view('Products/list', compact('products'));
    }

    public function updateProduct(Product $product, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:0',
            ]);

            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->quantity = $request->input('quantity');
            $product->save();
        }

        return view('Products/edit', [
            'product' => $product
        ]);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('successDelete', 'Produto excluído com sucesso!');
    }
}
