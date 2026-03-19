<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:"Poppins",sans-serif;}
        body{background:#f5f6fa;}

        nav{
            width:100%;
            padding:16px 8%;
            display:flex;
            background:white;
            border-bottom:1px solid #eee;
        }

        .container{
            max-width:900px;
            margin:40px auto;
            padding:20px;
        }

        .cart-card{
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 8px 20px rgba(0,0,0,0.06);
        }

        h1{margin-bottom:20px;}

        .item{
            display:flex;
            align-items:center;
            gap:15px;
            padding:12px;
            border:1px solid #eee;
            border-radius:10px;
            margin-bottom:12px;
            transition:.2s;
        }

        .item:hover{
            transform:translateY(-2px);
            box-shadow:0 6px 14px rgba(0,0,0,0.08);
        }

        .item img{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:8px;
        }

        .info{flex:1;}
        .name{font-weight:600;}
        .meta{font-size:.85rem;color:#777;}

        .actions{
            display:flex;
            gap:6px;
        }

        .btn{
            padding:6px 10px;
            border:none;
            border-radius:999px;
            cursor:pointer;
        }

        .qty{background:#eee;}
        .remove{background:#ff4d4f;color:white;}

        .footer{
            margin-top:20px;
            display:flex;
            justify-content:space-between;
        }

        .checkout{
            background:#0077ff;
            color:white;
            padding:10px 18px;
            border-radius:999px;
            text-decoration:none;
        }
    </style>
</head>
<body>

<nav>@include('nav')</nav>

<div class="container">
<div class="cart-card">

<h1>Your Cart</h1>

@if (!$cart || count($cart) === 0)
    <p>Your cart is empty.</p>
@else

@foreach ($cart as $id => $item)

@php
$product = \App\Models\Product::find($item['id']);
@endphp

<div class="item">
    <img src="{{ asset('images/products/' . ($product->image ?? 'default.png')) }}">

    <div class="info">
        <div class="name">{{ $item['name'] }}</div>
        <div class="meta">Qty: {{ $item['quantity'] }}</div>
    </div>

    <div class="actions">

        <form action="{{ route('cart.update', $id) }}" method="POST">
            @csrf
            <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
            <button class="btn qty">-</button>
        </form>

        <form action="{{ route('cart.update', $id) }}" method="POST">
            @csrf
            <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
            <button class="btn qty">+</button>
        </form>

        <form action="{{ route('cart.remove', $id) }}" method="POST">
            @csrf
            <button class="btn remove">Remove</button>
        </form>

    </div>
</div>

@endforeach

<div class="footer">
    <a href="{{ route('product') }}">Continue Shopping</a>

    @if (Auth::check())
        <a href="{{ route('checkout') }}" class="checkout">Checkout</a>
    @else
        <a href="{{ route('login') }}" class="checkout">Login</a>
    @endif
</div>

@endif

</div>
</div>

</body>
</html>