<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Your Password</title>
</head>
<body>

    <h1>Change Your Password</h1>

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

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div>
            <label for="current_password">Current Password:</label><br>
            <input type="password" name="current_password" id="current_password" required>
        </div>

        <div>
            <label for="password">New Password:</label><br>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm New Password:</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit">
            Update Your Password?
        </button>
    </form>

</body>
</html>