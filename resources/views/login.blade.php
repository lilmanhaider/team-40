<!DOCTYPE html>
<html lang="en">
<body>
    <br>
    <h2>Log In</h2>
    <br>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <p>Email: <input type="email" name="email" required /></p>
        <p>Password: <input type="password" name="password" required /></p>
        <br>
        <input type="submit" value="Log In" />
    </form>
</body>
</html>