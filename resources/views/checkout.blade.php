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

        .checkout-page{
          max-width:950px;
          margin:40px auto;
          padding:24px 28px;
        }

        .checkout-card{
          background:white;
          border-radius:16px;
          box-shadow:0 8px 24px rgba(0,0,0,0.06);
          padding:28px;
        }

        .checkout-header{
          display:flex;
          justify-content:space-between;
          align-items:flex-end;
          margin-bottom:20px;
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

        .alert{
          padding:12px 14px;
          border-radius:10px;
          font-size:0.9rem;
          margin-bottom:16px;
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

        .empty-checkout{
          text-align:center;
          padding:50px 20px;
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

        .checkout-items{
          display:flex;
          flex-direction:column;
          gap:14px;
          margin-top:10px;
        }

        .checkout-item{
          display:flex;
          align-items:center;
          gap:16px;
          padding:16px;
          border:1px solid #eee;
          border-radius:14px;
          background:#fcfcfc;
          transition:0.25s ease;
        }

        .checkout-item:hover{
          transform:translateY(-3px);
          box-shadow:0 8px 18px rgba(0,0,0,0.08);
        }

        .checkout-item img{
          width:84px;
          height:84px;
          object-fit:cover;
          border-radius:12px;
          background:#f3f3f3;
          flex-shrink:0;
        }

        .checkout-item-info{
          flex:1;
          min-width:0;
        }

        .checkout-item-name{
          font-size:1rem;
          font-weight:600;
          color:#222;
          margin-bottom:6px;
        }

        .checkout-item-meta{
          font-size:0.9rem;
          color:#777;
          line-height:1.5;
        }

        .checkout-item-price{
          text-align:right;
          min-width:120px;
        }

        .checkout-item-price .subtotal{
          font-size:1rem;
          font-weight:600;
          color:#222;
        }

        .checkout-item-price .unit-price{
          font-size:0.85rem;
          color:#777;
          margin-top:4px;
        }

        .checkout-total{
          margin-top:24px;
          padding-top:18px;
          border-top:1px solid #eee;
          text-align:right;
          font-size:1.15rem;
          font-weight:700;
          color:#222;
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
          font-size:0.95rem;
          color:#0077ff;
          text-decoration:none;
        }

        .checkout-links a:hover{
          text-decoration:underline;
        }

        .btn-finish{
          padding:11px 20px;
          border-radius:999px;
          border:none;
          font-size:0.92rem;
          cursor:pointer;
          background:#50ce29;
          color:#fff;
          transition:0.2s;
        }

        .btn-finish:hover{
          background:#43ba22;
        }
    </style>
</head>
<body>

@include('nav')

<div class="checkout-page">
    <div class="checkout-card">

        <div class="checkout-header">
            <div>
                <h1>Checkout Summary</h1>
                <p class="checkout-subtitle">Review your order details.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if (empty($cart))
            <div class="empty-checkout">
                <p>No items in cart.</p>
                <p><a href="{{ route('product') }}">Back to products</a></p>
            </div>
        @else

            @php $total = 0; @endphp

            <div class="checkout-items">
                @foreach ($cart as $item)
                    @php
                        $product = \App\Models\Product::find($item['id']);
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="checkout-item">
                        @if($product && $product->image)
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $item['name'] }}">
                        @else
                            <img src="{{ asset('images/products/default.png') }}" alt="Product image">
                        @endif

                        <div class="checkout-item-info">
                            <div class="checkout-item-name">{{ $item['name'] }}</div>
                            <div class="checkout-item-meta">
                                Quantity: {{ $item['quantity'] }}
                            </div>
                        </div>

                        <div class="checkout-item-price">
                            <div class="subtotal">£{{ number_format($subtotal, 2) }}</div>
                            <div class="unit-price">£{{ number_format($item['price'], 2) }} each</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="checkout-total">Total Price: £{{ number_format($total, 2) }}</p>

            <div class="checkout-footer">
                <div class="checkout-links">
                    <a href="{{ route('cart') }}">← Back to cart</a>
                </div>

                <form action="{{ route('checkout.finish') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-finish">Finish</button>
                </form>
            </div>

        @endif

    </div>
</div>

</body>
</html>