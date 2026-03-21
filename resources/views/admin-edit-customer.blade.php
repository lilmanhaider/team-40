<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f4f7ff;
        }

        .container{
            max-width:700px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }

        h1{
            margin-top:0;
        }

        form{
            display:flex;
            flex-direction:column;
            gap:15px;
        }

        input, textarea{
            width:100%;
            padding:10px;
            border:1px solid #ddd;
            border-radius:6px;
            font-size:0.95rem;
        }

        textarea{
            resize:vertical;
        }

        button{
            padding:10px;
            background:#0077ff;
            color:white;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-size:1rem;
        }

        button:hover{
            background:#005fcc;
        }

        .back-btn{
            display:inline-block;
            margin-bottom:20px;
            text-decoration:none;
            color:#0077ff;
            font-weight:500;
        }

        .back-btn:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>
    

    <div class="container">
        <a href="{{ route('admin.customers') }}" class="back-btn">← Back to Customers</a>
        <h1>Edit Customer</h1>

        <form method="POST" action="{{ route('admin.customers.update', $customer->id) }}">
            @csrf

            <label>Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ $customer->email }}" required>

            <button type="submit">Update Customer</button>
        </form>
    </div>
</body>
</html>