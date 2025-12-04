<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
</head>
<body>

<h1>Your Cart</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (!$cart || count($cart) === 0)
    <p>Your cart is currently empty.</p>
    <p><a href="{{ route('product') }}">Go back to browse our products</a></p>
@else

<table  border="1" cellpadding="8">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>

    @foreach ($cart as $id => $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>£{{ number_format($item['price'], 2) }}</td>
            <td>{{ $item['quantity'] }}</td>

            <td>

                
                <form action="{{ route('cart.update', $id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                    <button type="submit">-</button>
                </form>

                
                <form action="{{ route('cart.update', $id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                    <button type="submit">+</button>
                </form>

                
                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit">Remove</button>
                </form>

            </td>
        </tr>
    @endforeach
</table>

<p style="margin-top: 20px;">
    <a href="{{ route('product') }}">Would you like to Continue shopping?</a>
</p>


@if (Auth::check())
    <p style="margin-top:10px;">
        <a href="{{ route('checkout') }}" 
           style="padding:8px 16px; background:#0077ff; color:white; text-decoration:none; border-radius:5px;">
            Proceed to Checkout
        </a>
    </p>
@else
    <p style="margin-top:10px;">
        <a href="{{ route('login') }}" 
           style="padding:8px 16px; background:#ff4444; color:white; text-decoration:none; border-radius:5px;">
            Log in to Checkout
        </a>
    </p>
@endif
@endif

</body>
</html>
