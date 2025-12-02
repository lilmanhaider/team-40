<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
