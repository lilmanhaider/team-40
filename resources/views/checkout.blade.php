<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:"Poppins",sans-serif;}
        body{background:#f5f6fa;}

        nav{
            width:100%;
            padding:16px 8%;
            display:flex;
            align-items:center;
            justify-content:space-between;
            background:white;
            border-bottom:1px solid #eee;
        }

        .container{
            max-width:900px;
            margin:40px auto;
            padding:20px;
        }

        .checkout-card{
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

        .item-info{flex:1;}

        .item-name{font-weight:600;}
        .item-meta{font-size:.85rem;color:#777;}

        .price{font-weight:600;}

        .total{
            margin-top:15px;
            text-align:right;
            font-size:1.2rem;
            font-weight:600;
        }

        .footer{
            margin-top:20px;
            display:flex;
            justify-content:space-between;
        }

        .btn{
            padding:10px 18px;
            border:none;
            border-radius:999px;
            cursor:pointer;
        }

        .btn-back{background:#eee;}
        .btn-finish{background:#50ce29;color:white;}
    </style>
</head>
<body>

<nav>@include('nav')</nav>

<div class="container">
<div class="checkout-card">

<h1>Checkout Summary</h1>

@if (empty($cart))
    <p>No items in cart.</p>
@else

@php $total = 0; @endphp

@foreach ($cart as $item)

@php
$product = \App\Models\Product::find($item['id']);
$subtotal = $item['price'] * $item['quantity'];
$total += $subtotal;
@endphp

<div class="item">
    <img src="{{ asset('images/products/' . ($product->image ?? 'default.png')) }}">

    <div class="item-info">
        <div class="item-name">{{ $item['name'] }}</div>
        <div class="item-meta">Qty: {{ $item['quantity'] }}</div>
    </div>

    <div class="price">
        £{{ number_format($subtotal, 2) }}
    </div>
</div>

@endforeach

<div class="total">
    Total: £{{ number_format($total, 2) }}
</div>

<div class="footer">
    <a href="{{ route('cart') }}" class="btn btn-back">Back</a>

    <form action="{{ route('checkout.finish') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-finish">Finish</button>
    </form>
</div>

@endif

</div>
</div>

</body>
</html>