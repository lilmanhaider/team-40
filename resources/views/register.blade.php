<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an Account</title>
</head>

<body>

    <h1>Create an account</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div>
            <label for="name">Full Name</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email Address</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm Your Password</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit">
            Create account
        </button>

        <p>
            Already have an account?
            <a href="{{ route('login') }}">Log in</a>
        </p>
    </form>

</body>
</html>