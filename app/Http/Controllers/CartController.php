<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('cart', ['cart' => $cart]);
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id'       => $product->id,
                'name'     => $product->productName,
                'price'    => $product->price,
                'quantity' => 1,
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        $quantity = (int) $request->quantity;

        if ($quantity < 1) {
            unset($cart[$id]);
        } else {
            $cart[$id]['quantity'] = $quantity;
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Cart updated!');
    }

    public function remove(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item removed!');
    }
}
