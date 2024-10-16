<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withOptions(['verify'=>false])->get('https://dummyjson.com/products');
        $products = json_decode($response->body(), true)['products'];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['id' => $product['id']],
                [
                    'title' => $product['title'] ?? 'Unnamed Product',
                    'description' => $product['description'] ?? '',
                    'price' => $product['price'] ?? 0,
                    'brand' => $product['brand'] ?? 'Unknown Brand',
                    'category' => $product['category'] ?? 'Uncategorized',
                    'image_url' => $product['image'] ?? null,
                ]
            );
        }

        $search = $request->get('search');
        $query = Product::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('brand', 'like', '%' . $search . '%');
        }

        $products = $query->get(); 

        return view('master.products.index', compact('products')); 
    }

    public function create()
    {
        return view('master.products.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        Product::create($request->only(['title', 'description', 'price', 'brand', 'category', 'image_url']));

        return redirect()->route('master.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('master.products.edit', compact('product')); 
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        $product->update($request->only(['title', 'description', 'price', 'brand', 'category', 'image_url']));

        return redirect()->route('master.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('master.products.index')->with('success', 'Product deleted successfully.');
    }
}