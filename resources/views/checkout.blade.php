<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>

<h1>Checkout Summary</h1>

@if (empty($cart))
    <p>No items in cart.</p>
    <p><a href="{{ route('product') }}">Back to products</a></p>

@else

<table border="1" cellpadding="8">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>SubTotal</th>
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

    <tr>
        <td colspan="3"><strong>Total Price:</strong></td>
        <td><strong>£{{ number_format($total, 2) }}</strong></td>
    </tr>
</table>

<p style="margin-top:20px;">
    <a href="{{ route('cart') }}">← Back to cart</a>
</p>

@endif

</body>
</html>
