<!DOCTYPE html>
<html lang="en">
<head>
<style>
    <style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:"Poppins",sans-serif;
}

body{
  background:#f5f6fa;
}
h2{
text-align:center;
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

.hero{
  width:100%;
  padding:110px 8%;
  background: url("images/index/Logo.jpg") right/contain no-repeat;  
  background-color:#eef9b3; 
  display:flex;
  flex-direction:column;
  gap:15px;
  min-height:350px;
}


.hero h1{
  font-size:2.9rem;
  max-width:600px;
}

.hero p{
  font-size:1.1rem;
  max-width:520px;
  color:#444;
}

.hero button{
  margin-top:45px;
  padding:15px 250px;
  background:#50ce29;
  border:none;
  border-radius:8px;
  color:white;
  font-size:1rem;
  cursor:pointer;
  transition:.3s;
}

.hero button:hover{
  background:#45cc7f;
}
.hero .shop-btn {
  display:inline-block;
  padding:15px 150px;
  background:#50ce29;
  color:white;
  border-radius:8px;
  text-decoration:none;
  font-size:1.1rem;
  margin-top:45px;
  transition:0.3s ease;
}

.hero .shop-btn:hover {
  background:#45cc7f;
  transform:translateY(-5px);
  box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.section-title{
  text-align:center;
  font-size:1.9rem;
  margin-top:70px;
  margin-bottom:15px;
}

.card-container{
  width:100%;
  padding:0 8% 70px;
  display:grid;
  gap:30px;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
}

.card{
  padding:25px;
  border-radius:12px;
  background:white;
  border:1px solid #eee;
  transition:.3s;
}

.card:hover{
  transform:translateY(-4px);
  box-shadow:0 12px 32px rgba(0,0,0,0.06);
}

.card h3{
  margin-bottom:6px;
}

.card p{
  font-size:.95rem;
  color:#555;
  line-height:1.5;
}

footer{
  width:100%;
  text-align:center;
  background:#111;
  color:white;
  padding:35px;
  margin-top:40px;
  font-size:.95rem;
}

</style>


</head>
<body>
<nav>
  @include('nav')
</nav>


body {
    font-family: Arial, sans-serif;
    background: #f7f7f7;
    margin: 0;
    padding: 0;
}

.login-container {
    width: 340px;
    margin: 80px auto;
    padding: 25px;
    background: white;
    border: 1px solid #eee;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.login-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    margin-top: 8px;
}

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
    <nav>
     @include('nav')
    </nav>
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
     <p style="text-align:center">
        <a href="{{ route('register') }}">
            Dont have an account? Register here:
        </a>
    </p>

</div>
    
</html>
