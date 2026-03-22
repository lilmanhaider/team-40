<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
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
            box-sizing:border-box;
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
            padding:0;
        }

        nav ul li a{
            text-decoration:none;
            color:#444;
            font-size:1rem;
            transition:.3s;
        }

        .container{
            max-width:1100px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }

        .order-box{
            border:1px solid #ddd;
            padding:20px;
            margin-bottom:20px;
            border-radius:8px;
            background:#fafafa;
        }

        select, button{
            padding:8px;
            margin-top:10px;
        }

        .alert-success{
            background:#d4edda;
            color:#155724;
            padding:12px;
            border-radius:6px;
            margin-bottom:20px;
        }
    </style>
</head>
<body>

    @include('nav')

    <div class="container">
        <h1>Admin Orders</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach($orders as $order)
            <div class="order-box">
                <h3>Order #{{ $order->id }}</h3>
                <p><strong>Customer:</strong> {{ $order->user->name ?? 'Unknown user' }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Total:</strong> £{{ number_format($order->total_price, 2) }}</p>
                <p><strong>Current Status:</strong> {{ $order->status }}</p>

                <h4>Items:</h4>
                <ul>
                    @foreach($order->items as $item)
                        <li>
                            {{ $item->product->productName ?? 'Product deleted' }}
                            - Quantity: {{ $item->quantity }}
                            - Price each: £{{ number_format($item->price, 2) }}
                        </li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                    @csrf
                    <label for="status">Update Status:</label>
                    <select name="status">
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="Returning" {{ $order->status == 'Returning' ? 'selected' : '' }}>Returning</option>
                        <option value="Returned" {{ $order->status == 'Returned' ? 'selected' : '' }}>Returned</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>