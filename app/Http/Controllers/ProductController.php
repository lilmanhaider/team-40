<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product', [
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required'
        ]);

        $products = Product::where('category', $validated['category'])->get();

        return view('product', [
            'products' => $products
        ]);
    }

    public function showReviews(string $id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->get();

        return view('ProductShow', [
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }
}
