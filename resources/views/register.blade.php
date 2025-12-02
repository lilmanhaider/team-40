<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an Account</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .register-container {
            width: 380px;
            margin: 60px auto;
            padding: 25px;
            background: white;
            border: 1px solid #eee;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .register-container label {
            display: block;
            font-weight: bold;
            margin-top: 12px;
            color: #444;
        }

        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-top: 6px;
            font-size: 1rem;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            margin-top: 20px;
            cursor: pointer;
        }

        .register-container button:hover {
            background: #45a049;
        }

        .error-box, .success-box {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .error-box {
            background: #ffe5e5;
            border: 1px solid #ff9c9c;
            color: #b30000;
        }

        .success-box {
            background: #e6ffed;
            border: 1px solid #a8e6b7;
            color: #256029;
        }
    </style>
</head>

<body>

    <div class="register-container">

        <h1>Create an Account</h1>

        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Register</button>

        </form>

    </div>

</body>
</html>
