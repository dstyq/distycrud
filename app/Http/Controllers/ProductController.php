<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withOptions(['verify' => false])->get('https://dummyjson.com/products');
        $productsData = json_decode($response->body(), true)['products'];

        foreach ($productsData as $product) {
            Product::updateOrCreate(
                ['id' => $product['id']],
                [
                    'title' => $product['title'] ?? 'Unnamed Product',
                    'description' => $product['description'] ?? '',
                    'category' => $product['category'] ?? 'Uncategorized',
                    'price' => $product['price'] ?? 0,
                    'rating' => $product['rating'] ?? 0,
                    'stock' => $product['stock'] ?? 0,
                    'brand' => $product['brand'] ?? 'Unknown Brand',
                    'sku' => $product['sku'] ?? null,
                    'images' => $product['images'] ?? [],
                    'warrantyInformation' => $product['warrantyInformation'] ?? null,
                    'shippingInformation' => $product['shippingInformation'] ?? null,
                    'availabilityStatus' => $product['availabilityStatus'] ?? null,
                ]
            );
        }

        $search = $request->get('search');
        $query = Product::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('brand', 'like', '%' . $search . '%');
        }

        $products = $query->paginate(10); 

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
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images' => 'nullable|array',
            'warrantyInformation' => 'nullable|string',
            'shippingInformation' => 'nullable|string',
            'availabilityStatus' => 'nullable|string',
        ]);

        Product::create($request->only([
            'title', 'description', 'category', 'price', 
            'rating', 'stock', 'brand', 'sku', 
            'images', 'warrantyInformation', 
            'shippingInformation', 'availabilityStatus'
        ]));

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
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images' => 'nullable|array', 
            'warrantyInformation' => 'nullable|string',
            'shippingInformation' => 'nullable|string',
            'availabilityStatus' => 'nullable|string',
        ]);

        $product->update($request->only([
            'title', 'description', 'category', 'price', 
            'rating', 'stock', 'brand', 'sku', 
            'images', 'warrantyInformation', 
            'shippingInformation', 'availabilityStatus'
        ]));

        return redirect()->route('master.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('master.products.index')->with('success', 'Product deleted successfully.');
    }
}
