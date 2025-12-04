<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Modern Homepage</title>

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
  <div class="logo">
    <img src="images/index/Logo.jpg" alt="Tech4ForU Logo">
  </div>

  <ul>
    <li><a href="{{ route('homepage') }}">Home</a></li>
    <li><a href="{{ route('product') }}">Product Page</a></li>
    <li><a href="{{ route('about') }}">About Us</a></li>
    <li><a href="{{ route('contact') }}">Contact Us</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('cart') }}">Cart</a></li>
  </ul>
    

   
</nav>


   



<section class="hero">
    <div>
  <h1>The Best Place to Buy Gaming Tech & More!</h1>
  <p>Powering Your Gaming Experience, One Upgrade at a Time...</p>
<a href="{{ route('product') }}" class="shop-btn">We price match any website!</a>

  </div>
</section>

<li></li>
<h2 class="section-title">Our Services</h2>

<div class="card-container">

  <div class="card">
    <h3>Consulting</h3>
    <p>Expert tailored advice to accelerate your goals.</p>
  </div>

  <div class="card">
    <h3>Design</h3>
    <p>Clean and modern UI and UX built for conversion.</p>
  </div>

  <div class="card">
    <h3>Development</h3>
    <p>Modern applications delivered with speed and quality.</p>
  </div>

</div>


<footer>
  © 2025 MyWebsite — All rights reserved.
</footer>

</body>
</html>
