<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Orders</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"Poppins",sans-serif;
        }

        body{
            background:#f4f7ff;
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
        }

        nav ul{
            margin-left:auto;
            display:flex;
            gap:30px;
            list-style:none;
        }

        nav ul li a{
            text-decoration:none;
            color:#444;
        }

        nav ul li a:hover{
            color:#0077ff;
        }

        .container{
            max-width:1100px;
            margin:40px auto;
            padding:20px;
        }

        h1{
            margin-bottom:20px;
        }

        .order-card{
            background:white;
            border-radius:12px;
            padding:20px;
            margin-bottom:25px;
            box-shadow:0 8px 20px rgba(0,0,0,0.06);
        }

        .order-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:15px;
        }

        .order-meta{
            font-size:0.9rem;
            color:#666;
        }

        .status{
            padding:6px 12px;
            border-radius:999px;
            font-size:0.8rem;
            background:#e6f7e9;
            color:#237804;
        }

        .items{
            display:flex;
            flex-direction:column;
            gap:12px;
            margin-top:15px;
        }

        .item{
            display:flex;
            align-items:center;
            gap:15px;
            padding:12px;
            border-radius:10px;
            border:1px solid #eee;
            transition:0.2s;
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

        .item-info{
            flex:1;
        }

        .item-name{
            font-weight:600;
        }

        .item-meta{
            font-size:0.85rem;
            color:#777;
        }

        .item-price{
            font-weight:600;
        }

        .alert{
            padding:12px;
            margin-bottom:20px;
            border-radius:6px;
            background:#d4edda;
            color:#155724;
        }

        .empty{
            background:white;
            padding:30px;
            border-radius:10px;
            text-align:center;
            color:#777;
        }
    </style>
</head>
<body>

@include('nav')

<div class="container">

    <h1>Previous Orders</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div class="empty">
            You have not placed any orders yet.
        </div>
    @else

        @foreach($orders as $order)

            <div class="order-card">

                <div class="order-header">
                    <div>
                        <h3>Order #{{ $order->id }}</h3>
                        <div class="order-meta">
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <div>
                        <div class="status">{{ $order->status }}</div>
                        <div class="order-meta">
                            £{{ number_format($order->total_price, 2) }}
                        </div>
                    </div>
                </div>

                <div class="items">

                    @foreach($order->items as $item)

                        <div class="item">

                            @if($item->product && $item->product->image)
                                <img src="{{ asset('images/products/' . $item->product->image) }}">
                            @else
                                <img src="{{ asset('images/products/default.png') }}">
                            @endif

                            <div class="item-info">
                                <div class="item-name">
                                    {{ $item->product->productName ?? 'Product deleted' }}
                                </div>

                                <div class="item-meta">
                                    Quantity: {{ $item->quantity }}
                                </div>
                            </div>

                            <div class="item-price">
                                £{{ number_format($item->price, 2) }}
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @endforeach

    @endif

</div>

</body>
</html>