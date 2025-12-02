<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f7f7f7;
    margin: 0;
    padding: 0;
}

/* the login box */
.login-container {
    width: 340px;
    margin: 80px auto;
    padding: 25px;
    background: white;
    border: 1px solid #eee;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

/* title of the login popupp*/
.login-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

/* th text inside the login popup*/
.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    margin-top: 8px;
}

/* Submit button */
.login-container input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: #0077ff;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 1rem;
    margin-top: 18px;
    cursor: pointer;
    transition: 0.2s;
}
.login-container input[type="submit"]:hover {
    background: #005fcc;
}

/* errror page box */
.error {
    background: #ffdddd;
    color: #c00;
    border: 1px solid #ffb3b3;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 0.9rem;
}
</style>
</head>

<body>

<div class="login-container">

    <h2>Log In</h2>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" required />

        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required />

        <input type="submit" value="Log In" />
    </form>

</div>

</body>
</html>
