<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:0',
            ]);

            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity')
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Produto criado com sucesso!',
                    'product' => $product
                ], 201);
            }

            return redirect()->route('products.list')->with('success', 'Produto criado com sucesso!');
        }

        return view('Products/create');
    }


    public function listProducts(Request $request)
    {
        $csrfToken = csrf_token();
        $products = Product::all();

        if ($request->wantsJson()) {

            return response()->json([
                'csrf_token' => $csrfToken,
                'products' => $products
            ]);
        }

        return view('Products/list', compact('products'));
    }


    public function updateProduct(Product $product, Request $request)
    {
        if ($request->isMethod('put') || $request->isMethod('patch')) {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:0',
            ]);
    
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->quantity = $request->input('quantity');
            $product->save();
    
            return response()->json([
                'message' => 'Produto atualizado com sucesso!',
                'product' => $product
            ]);
        }
    
        if ($request->isMethod('get') || $request->isMethod('post')) {
            
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
    
                return redirect()->route('products.list')->with('success', 'Produto atualizado com sucesso!');
            }
    
            return view('Products/edit', [
                'product' => $product
            ]);
        }
    }

    public function deleteProduct($id, Request $request)
    {
        // Encontrar o produto ou lançar erro 404
        $product = Product::findOrFail($id);
    
        // Deletar o produto
        $product->delete();
    
        // Verificar se a requisição quer uma resposta JSON (API)
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Produto excluído com sucesso!',
                'product_id' => $id
            ], 200); // Status code 200 OK
        }
    
        // Redirecionar para a lista de produtos com uma mensagem de sucesso se não for uma requisição API
        return redirect('/products')->with('successDelete', 'Produto excluído com sucesso!');
    }
    
}
