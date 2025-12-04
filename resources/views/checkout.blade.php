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

        .empty-checkout{
          text-align:center;
          padding:40px 0 10px;
          font-size:1rem;
          color:#555;
        }

        .empty-checkout a{
          color:#0077ff;
          text-decoration:none;
        }

        .empty-checkout a:hover{
          text-decoration:underline;
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
          border-bottom:1px solid #e5e5e5;
        }

        .checkout-table tr:nth-child(even){
          background:#fafafa;
        }

        .checkout-total{
          margin-top:18px;
          font-size:1.05rem;
          font-weight:600;
          text-align:right;
        }

        .checkout-footer{
          margin-top:24px;
          display:flex;
          justify-content:space-between;
          align-items:center;
          flex-wrap:wrap;
          gap:12px;
        }

        .checkout-links a{
          font-size:0.9rem;
          color:#0077ff;
          text-decoration:none;
        }

        .checkout-links a:hover{
          text-decoration:underline;
        }

        .btn-finish{
          padding:10px 18px;
          border-radius:999px;
          border:none;
          font-size:0.9rem;
          cursor:pointer;
          background:#50ce29;
          color:#fff;
          text-decoration:none;
          display:inline-block;
          transition:0.2s;
        }

        .btn-finish:hover{
          background:#43ba22;
        }
    </style>
</head>
<body>

<nav>
  <div class="logo">
    <img src="images/index/Logo.jpg" alt="Tech4ForU Logo">
  </div>

  <ul>
    <li><a href="{{ route('homepage') }}">Home</a></li>
    <li><a href="{{ route('product') }}">Product Page</a></li>
    <li><a href="{{ route('about') }}">About Us</a></li>
    <li><a href="{{ route('contact') }}">Contact Us</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('cart') }}">Cart</a></li>
  </ul>
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
            <p><a href="{{ route('product') }}">Back to products</a></p>
        </div>
    @else

        <table class="checkout-table">
            <tr>
                <th style="width:40%;">Product</th>
                <th style="width:20%;">Price</th>
                <th style="width:20%;">Quantity</th>
                <th style="width:20%;">Subtotal</th>
            </tr>

            @php $total = 0; @endphp

            @foreach ($cart as $item)
                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>£{{ number_format($item['price'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>£{{ number_format($subtotal, 2) }}</td>
                </tr>
            @endforeach
        </table>

        <p class="checkout-total">Total Price: £{{ number_format($total, 2) }}</p>

        <div class="checkout-footer">
            <div class="checkout-links">
                <a href="{{ route('cart') }}">← Back to cart</a>
            </div>

            <a href="{{ route('homepage') }}" class="btn-finish">
                Finish
            </a>
        </div>

    @endif

</div>

</body>
</html>
