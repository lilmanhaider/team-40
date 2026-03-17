<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('checkout', ['cart' => $cart]);
    }

    public function finish(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('product')->with('error', 'Your cart is empty.');
        }

        foreach ($cart as $id => $item) {
            $product = Product::find($id);

            if (!$product) {
                return redirect()->route('cart')->with('error', 'Product no longer exists.');
            }

            if ($product->stockQuantity < $item['quantity']) {
                return redirect()->route('cart')
                    ->with('error', 'Not enough stock for ' . $product->productName);
            }
        }

        foreach ($cart as $id => $item) {
            $product = Product::find($id);

            $product->stockQuantity -= $item['quantity'];
            $product->save();
        }

        $request->session()->forget('cart');

        return redirect()->route('product')->with('success', 'Order completed!');
    }
}