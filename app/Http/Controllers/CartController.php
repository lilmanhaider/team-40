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

        // Current quantity in cart
        $currentQty = isset($cart[$id]) ? $cart[$id]['quantity'] : 0;

        // ❗ Check stock before adding
        if ($currentQty >= $product->stockQuantity) {
            return redirect()->back()->with('error', 'Not enough stock available');
        }

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

        $product = Product::findOrFail($id);

        // Remove item if quantity < 1
        if ($quantity < 1) {
            unset($cart[$id]);
        } else {

            // ❗ Prevent exceeding stock
            if ($quantity > $product->stockQuantity) {
                return redirect()->route('cart')
                    ->with('error', 'Not enough stock available');
            }

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
    public function applyPromo(Request $request)
{
    $code = strtoupper($request->promo_code);

    if ($code === 'TEAM40') {
        session()->put('discount', 0.10);
        return redirect()->back()->with('success', 'Promo code applied!');
    }

    return redirect()->back()->with('error', 'Invalid promo code');
}

public function removePromo()
{
    session()->forget('discount');
    return back()->with('success', 'Promo code removed');
}
}
