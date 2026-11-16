<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show the home page
    public function index()
    {
        // Get all products
        $products = Product::where('stock_quantity', '>', 0)->take(8)->get();
        
        return view('home', compact('products'));
    }

    // Search for products
    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');

        // Start with all products that are in stock
        $products = Product::where('stock_quantity', '>', 0);

        // If there's a search query, look for it in name, description or category
        if ($query) {
            $products->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('category', 'like', "%{$query}%");
            });
        }

        // Filter by category if selected
        if ($category) {
            $products->where('category', $category);
        }

        // Get the results
        $products = $products->get();

        return view('products.search', compact('products', 'query'));
    }

    // Show a single product
    public function product($id)
    {
        // Find the product or show 404 error
        $product = Product::findOrFail($id);
        
        // Get related products from the same category
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $id)
            ->where('stock_quantity', '>', 0)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}