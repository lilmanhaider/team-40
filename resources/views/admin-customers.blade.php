<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>
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
        <div class="top-bar">
            <h1>Manage Customers</h1>
            <a class="add-btn" href="{{ route('admin.customers.create') }}">Add Customer</a>
        </div>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a class="edit-btn" href="{{ route('admin.customers.edit', $customer->id) }}">Edit</a>

                            <form action="{{ route('admin.customers.delete', $customer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="delete-btn" type="submit" onclick="return confirm('Delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>