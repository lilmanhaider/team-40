<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        try {
            $totalPrice = 0;

            foreach ($cart as $id => $item) {
                $product = Product::find($id);

                if (!$product) {
                    throw new \Exception('Product no longer exists.');
                }

                if ($product->stockQuantity < $item['quantity']) {
                    throw new \Exception('Not enough stock for ' . $product->productName);
                }

                $totalPrice += $product->price * $item['quantity'];
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $totalPrice,
                'status' => 'Pending',
            ]);

            foreach ($cart as $id => $item) {
                $product = Product::find($id);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);

                $product->stockQuantity -= $item['quantity'];
                $product->save();
            }

            $request->session()->forget('cart');

            DB::commit();

            return redirect()->route('orders')->with('success', 'Order completed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('cart')->with('error', $e->getMessage());
        }
    }
}