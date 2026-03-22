<!DOCTYPE html>
<html lang="en">

<head>
    <nav>
     @include('nav')
    </nav>
    <style>
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
}

nav ul li a{
  text-decoration:none;
  color:#444;
  font-size:1rem;
  transition:0.3s;
  display:flex;
  align-items:center;
  gap:4px;
}

nav ul li a:hover{
  color:#0077ff;
}

.nav-icon{
  font-size:1.05rem;
}
</style>

>>>>>>> 4980830151691f777a801e82a0301d6806d232c2
    
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Poppins",sans-serif;
}

body {
    font-family: Arial, sans-serif;
    background: #f7f7f7;
    margin: 0;
    padding: 0;
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
}

nav ul li a{
    text-decoration:none;
    color:#444;
}

nav ul li a:hover{
    color:#0077ff;
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

.login-container label{
    display:block;
    margin-top:12px;
    margin-bottom:6px;
    color:#333;
    font-weight:600;
}

.register-link{
    text-align:center;
    margin-top:18px;
}

.register-link a{
    text-decoration:none;
    color:#0077ff;
}

.register-link a:hover{
    text-decoration:underline;
}
</style>
</head>

<body>

    @include('nav')

    <div class="login-container">

        <h2>Log In</h2>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <label>Email:</label>
            <input type="email" name="email" required />

            <label>Password:</label>
            <input type="password" name="password" required />

            <input type="submit" value="Log In" />
        </form>

        <p class="register-link">
            <a href="{{ route('register') }}">
                Dont have an account? Register here:
            </a>
        </p>

    </div>

</body>
</html>