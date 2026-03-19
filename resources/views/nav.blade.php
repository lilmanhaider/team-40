@php 
    use Illuminate\Support\Facades\Auth;
@endphp

<nav>
    <div class="logo">
        <img src="{{ asset('images/index/Logo.jpg') }}" alt="Tech4ForU Logo">
    </div>

    <ul>
        <li><a href="{{ route('homepage') }}">Home</a></li>
        <li><a href="{{ route('product') }}">Products</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('cart') }}">Cart</a></li>

        @if (Auth::check())
            <li><a href="{{ route('logout') }}">Logout</a></li>
            <li><a href="{{ route('password.change') }}">Password</a></li>
            <li><a href="{{ route('orders') }}">Orders</a></li>
            <li><a href="{{ route('admin.orders') }}">Admin</a></li>
            
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
        @endif
    </ul>
</nav>