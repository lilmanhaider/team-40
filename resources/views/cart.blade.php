<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
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

        nav .logo{
          display:flex;
          align-items:center;
          gap:10px;
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

        .cart-page{
          max-width:900px;
          margin:40px auto;
          padding:24px 28px;
          background:white;
          border-radius:12px;
          box-shadow:0 8px 24px rgba(0,0,0,0.06);
        }

        .cart-header{
          display:flex;
          justify-content:space-between;
          align-items:center;
          margin-bottom:18px;
        }

        .cart-header h1{
          font-size:1.8rem;
          color:#222;
        }

        .cart-subtitle{
          font-size:0.95rem;
          color:#777;
        }

        .alert{
          padding:10px 12px;
          border-radius:8px;
          font-size:0.9rem;
          margin-bottom:15px;
        }

        .alert-success{
          background:#e6f7e9;
          color:#237804;
          border:1px solid #b7eb8f;
        }

        .alert-error{
          background:#fff1f0;
          color:#a8071a;
          border:1px solid #ffa39e;
        }

        .cart-table{
          width:100%;
          border-collapse:collapse;
          margin-top:10px;
        }

        .cart-table th,
        .cart-table td{
          padding:12px 10px;
          text-align:left;
          font-size:0.95rem;
        }

        .cart-table th{
          background:#f5f5f5;
          color:#555;
          border-bottom:1px solid #e5e5e5;
        }

        .cart-table tr:nth-child(even){
          background:#fafafa;
        }

        .cart-table tr:last-child td{
          border-bottom:none;
        }

        .cart-actions{
          display:flex;
          align-items:center;
          gap:8px;
        }

        .btn{
          display:inline-block;
          padding:6px 12px;
          border-radius:999px;
          border:none;
          font-size:0.8rem;
          cursor:pointer;
          transition:0.2s;
        }

        .btn-qty{
          background:#f0f0f0;
          color:#333;
        }

        .btn-qty:hover{
          background:#e0e0e0;
        }

        .btn-remove{
          background:#ff4d4f;
          color:#fff;
        }

        .btn-remove:hover{
          background:#d9363e;
        }

        .cart-footer{
          margin-top:22px;
          display:flex;
          flex-wrap:wrap;
          justify-content:space-between;
          align-items:center;
          gap:12px;
        }

        .cart-links a{
          font-size:0.9rem;
          color:#0077ff;
          text-decoration:none;
        }

        .cart-links a:hover{
          text-decoration:underline;
        }

        .btn-primary{
          padding:10px 18px;
          border-radius:999px;
          border:none;
          font-size:0.9rem;
          cursor:pointer;
          background:#0077ff;
          color:#fff;
          text-decoration:none;
          display:inline-block;
          transition:0.2s;
        }

        .btn-primary:hover{
          background:#005fcc;
        }

        .btn-warning{
          background:#ff4444;
          color:#fff;
        }

        .btn-warning:hover{
          background:#d9363e;
        }

        .empty-cart{
          text-align:center;
          padding:40px 0 10px;
          font-size:1rem;
          color:#555;
        }

        .empty-cart a{
          color:#0077ff;
          text-decoration:none;
        }

        .empty-cart a:hover{
          text-decoration:underline;
        }
    </style>
</head>
<body>

<nav>
  <div class="logo">
    <img src="images/index/Logo.jpg" alt="Tech4ForU Logo">
  </div>

  @include('.nav')
</nav>

<div class="cart-page">

    <div class="cart-header">
        <div>
            <h1>Your Cart</h1>
            <p class="cart-subtitle">Review your items before checkout.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (!$cart || count($cart) === 0)
        <div class="empty-cart">
            <p>Your cart is currently empty.</p>
            <p><a href="{{ route('product') }}">Go back to browse our products</a></p>
        </div>
    @else

        <table class="cart-table">
            <tr>
                <th style="width:40%;">Product</th>
                <th style="width:15%;">Price</th>
                <th style="width:15%;">Quantity</th>
                <th style="width:30%;">Actions</th>
            </tr>

            @foreach ($cart as $id => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>£{{ number_format($item['price'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>
                        <div class="cart-actions">
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                <button type="submit" class="btn btn-qty">-</button>
                            </form>

                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                <button type="submit" class="btn btn-qty">+</button>
                            </form>

                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-remove">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="cart-footer">
            <div class="cart-links">
                <a href="{{ route('product') }}">← Continue shopping</a>
            </div>

            @if (Auth::check())
                <a href="{{ route('checkout') }}" class="btn-primary">
                    Proceed to Checkout
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-primary btn-warning">
                    Log in to Checkout
                </a>
            @endif
        </div>

    @endif

</div>

</body>
</html>
