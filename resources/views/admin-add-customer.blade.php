<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
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

    <div class="container">
        <a href="{{ route('admin.customers') }}" class="back-btn">← Back to Customers</a>
        <h1>Add Customer</h1>

        <form method="POST" action="{{ route('admin.customers.store') }}">
            @csrf

            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Create Customer</button>
        </form>
    </div>
</body>
</html>