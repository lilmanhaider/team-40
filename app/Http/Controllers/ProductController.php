<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('product',['products'=>[Product::all()]]);
    }
    public function search(request $request)
    {
        $category=$request->validate([

            'category'=> 'required'
        ]);

        $products=Product::where('category',$category['category']);
        return view('product', ['products'=>[$products]]);
    }

}