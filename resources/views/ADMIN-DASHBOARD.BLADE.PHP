<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
        }

        .container{
            max-width:1100px;
            margin:40px auto;
            padding:20px;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
            gap:20px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }

        .card h3{
            margin-top:0;
        }

        .links{
            margin-top:30px;
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .links a{
            text-decoration:none;
            background:#0077ff;
            color:white;
            padding:10px 16px;
            border-radius:6px;
        }
    </style>
</head>
<body>

    @include('nav')

    <div class="container">
        <h1>Admin Dashboard</h1>

        <div class="cards">
            <div class="card">
                <h3>Total Customers</h3>
                <p>{{ $totalCustomers }}</p>
            </div>

            <div class="card">
                <h3>Total Orders</h3>
                <p>{{ $totalOrders }}</p>
            </div>

            <div class="card">
                <h3>Pending Orders</h3>
                <p>{{ $pendingOrders }}</p>
            </div>

            <div class="card">
                <h3>Low Stock Products</h3>
                <p>{{ $lowStockProducts }}</p>
            </div>
        </div>

        <div class="links">
            <a href="{{ route('admin.orders') }}">Manage Orders</a>
            <a href="{{ route('admin.customers') }}"> Manage Customers</a>
            <a href="{{ route('admin.products') }}"> Manage Products</a>
        </div>
    </div>

</body>
</html>