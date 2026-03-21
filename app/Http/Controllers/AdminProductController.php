<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied');
        }

        $products = Product::latest()->get();

        return view('admin-products', compact('products'));
    }

    public function create()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied');
        }

        return view('admin-add-product');
    }

    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied');
        }

        $request->validate([
            'productName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stockQuantity' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        Product::create([
            'productName' => $request->productName,
            'description' => $request->description,
            'price' => $request->price,
            'stockQuantity' => $request->stockQuantity,
            'category' => $request->category,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied');
        }

        $product = Product::findOrFail($id);

        return view('admin-edit-product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied');
        }

        $product = Product::findOrFail($id);

        $request->validate([
            'productName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stockQuantity' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        $product->update([
            'productName' => $request->productName,
            'description' => $request->description,
            'price' => $request->price,
            'stockQuantity' => $request->stockQuantity,
            'category' => $request->category,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product has been updated successfully');
    }

    public function destroy($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product has been deleted successfully');
    }
}