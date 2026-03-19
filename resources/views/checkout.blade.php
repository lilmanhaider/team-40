<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        *{
          margin:0;
          padding:0;
          box-sizing:border-box;
          font-family:"Poppins",sans-serif;
        }

        body{
          background:#f5f6fa;
        }

        nav{
          width:100%;
          padding:16px 8%;
          display:flex;
          align-items:center;
          justify-content:space-between;
          background:white;
          border-bottom:1px solid #eee;
          position:sticky;
          top:0;
          z-index:999;
        }

        nav .logo img{
          height:55px;
          width:auto;
        }

        nav ul{
          margin-left:auto;
          display:flex;
          gap:30px;
          list-style:none;
          align-items:center;
        }

        nav ul li a{
          text-decoration:none;
          color:#444;
          font-size:1rem;
          transition:0.3s;
          display:flex;
          align-items:center;
          gap:4px;
        }

        nav ul li a:hover{
          color:#0077ff;
        }

        .checkout-page{
          max-width:900px;
          margin:40px auto;
          padding:24px 28px;
          background:white;
          border-radius:12px;
          box-shadow:0 8px 24px rgba(0,0,0,0.06);
        }

        .checkout-header{
          display:flex;
          justify-content:space-between;
          align-items:flex-end;
          margin-bottom:16px;
        }

        .checkout-header h1{
          font-size:1.9rem;
          color:#222;
        }

        .checkout-subtitle{
          font-size:0.95rem;
          color:#777;
          margin-top:4px;
        }

        .checkout-table{
          width:100%;
          border-collapse:collapse;
          margin-top:10px;
        }

        .checkout-table th,
        .checkout-table td{
          padding:12px 10px;
          text-align:left;
          font-size:0.95rem;
        }

        .checkout-table th{
          background:#f5f5f5;
          color:#555;
        }

        .checkout-total{
          margin-top:18px;
          font-size:1.05rem;
          font-weight:600;
          text-align:right;
        }

        .btn-finish{
          padding:10px 18px;
          border-radius:999px;
          border:none;
          background:#50ce29;
          color:#fff;
          cursor:pointer;
        }
    </style>
</head>
<body>

<nav>
  @include('nav')
</nav>

<div class="checkout-page">

<div class="checkout-header">
    <div>
        <h1>Checkout Summary</h1>
        <p class="checkout-subtitle">Review your order details.</p>
    </div>
</div>

@if (empty($cart))
    <div class="empty-checkout">
        <p>No items in cart.</p>
    </div>
@else

<table class="checkout-table">
<tr>
    <th style="width:45%;">Product</th>
    <th style="width:15%;">Price</th>
    <th style="width:20%;">Quantity</th>
    <th style="width:20%;">Subtotal</th>
</tr>

@php $total = 0; @endphp

@foreach ($cart as $item)

@php
$product = \App\Models\Product::find($item['id']);
$subtotal = $item['price'] * $item['quantity'];
$total += $subtotal;
@endphp

<tr>
<td style="display:flex; align-items:center; gap:10px;">

@if($product && $product->image)
<img src="{{ asset('images/products/' . $product->image) }}" style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
@else
<img src="{{ asset('images/products/default.png') }}" style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
@endif

{{ $item['name'] }}

</td>

<td>£{{ number_format($item['price'], 2) }}</td>
<td>{{ $item['quantity'] }}</td>
<td>£{{ number_format($subtotal, 2) }}</td>
</tr>

@endforeach
</table>

<form action="{{ route('promo.apply') }}" method="POST" style="margin-top:15px;">
@csrf
<input type="text" name="promo_code" placeholder="Enter promo code"
style="padding:8px; border-radius:6px; border:1px solid #ccc;">
<button type="submit" class="btn-finish" style="padding:8px 14px;">Apply</button>
</form>

@if(session('discount'))
<form action="{{ route('promo.remove') }}" method="POST" style="margin-top:10px;">
@csrf
<button type="submit" style="background:#ff4d4f;color:white;padding:6px 12px;border:none;border-radius:6px;">
Remove Promo Code
</button>
</form>
@endif

@if(session('success'))
<p style="color:green;margin-top:10px;">{{ session('success') }}</p>
@endif

@if(session('error'))
<p style="color:red;margin-top:10px;">{{ session('error') }}</p>
@endif

@php
$discount = session('discount', 0);
$discountAmount = $total * $discount;
$finalTotal = $total - $discountAmount;
@endphp

@if($discount > 0)
<p class="checkout-total">
Discount (10%): -£{{ number_format($discountAmount, 2) }}
</p>
@endif

<p class="checkout-total">
Total Price: £{{ number_format($finalTotal, 2) }}
</p>

<div class="checkout-footer">
    <a href="{{ route('cart') }}">← Back to cart</a>

    <form action="{{ route('checkout.finish') }}" method="POST">
    @csrf
    <button type="submit" class="btn-finish">Finish</button>
    </form>
</div>

@endif

</div>

</body>
</html>