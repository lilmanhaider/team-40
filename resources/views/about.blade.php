<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    
    <style>
    
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
      }

    
      header {
        background-color: #2c3e50;
        color: white;
        padding: 20px 0;
        text-align: center;
      }

      h1 {
        margin: 0;
        font-size: 2.5rem;
      }

      
      .nav-links {
        margin-top: 15px;
        text-align: center;
      }

      .nav-links a {
        text-decoration: none;
        color: #ecf0f1;
        font-weight: bold;
        font-size: 1.2rem;
        margin: 0 15px;
        padding: 5px 10px;
        border: 1px solid transparent;
        transition: all 0.3s ease;
      }

      .nav-links a:hover {
        border: 1px solid #ecf0f1;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.1);
      }

     
      .container {
        max-width: 800px;
        margin: 40px auto;
        background: white;
        padding: 40px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-radius: 8px;
      }

      h2 {
        color: #2c3e50;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
        margin-top: 30px;
      }

      p {
        margin-bottom: 20px;
      }

      
      .support-box {
        background-color: #e8f6f3;
        border-left: 5px solid #1abc9c;
        padding: 15px;
        margin-top: 20px;
      }

      footer {
        text-align: center;
        padding: 20px;
        background-color: #333;
        color: white;
        margin-top: 40px;
      }
    </style>
  </head>

  <body>
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
  padding:60px 8% 40px;
  background:#eaf1ff;
  display:flex;
  flex-direction:column;
  gap:15px;
}
.section-title{
  font-size:1.4rem;
  margin-top:20px;
  margin-bottom:15px;
  padding:0 8%;
}
.product-toolbar{
  width:100%;
  padding:0 8%;
  margin-top:20px;
  display:flex;
  flex-wrap:wrap;
  gap:12px;
  align-items:center;
  justify-content:space-between;
}
.category-filters{
  display:flex;
  flex-wrap:wrap;
  gap:8px;
}
.filter-btn{
  padding:8px 14px;
  border-radius:999px;
  border:1px solid #ccc;
  background:#fff;
  font-size:0.9rem;
  cursor:pointer;
  transition:0.2s;
}
.filter-btn:hover{
  border-color:#0077ff;
}
.filter-btn.active{
  background:#0077ff;
  color:#fff;
  border-color:#0077ff;
}
.search-wrapper{
  flex:1 1 260px;
  position:relative;
}
.search-wrapper input{
  width:100%;
  padding:10px 12px 10px 34px;
  border-radius:999px;
  border:1px solid #ccc;
}
.product-grid{
  width:100%;
  padding:10px 8% 50px;
  display:grid;
  gap:24px;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
}
.product-card{
  padding:22px;
  border-radius:12px;
  background:white;
  border:1px solid #eee;
  display:flex;
  flex-direction:column;
  gap:10px;
}
.product-name{
  font-size:1.05rem;
  font-weight:600;
}
.product-price{
  font-weight:600;
}
.product-category{
  font-size:0.85rem;
  color:#777;
  margin-bottom:6px;
}
.no-results{
  width:100%;
  padding:0 8% 40px;
  text-align:center;
  color:#777;
  display:none;
}
</style>

</head>

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

<body>

  
    <div class="container">
      
      <h2>Our Mission</h2>
      <p>
        The <strong>Tech4ForU</strong> project aims to provide budgeted technology such as Computer Games, accessories, controllers, consoles, hardware, software security, and more. 
      </p>
      <p>
        Tech4forU examines customers' needs and then comes out with recommended tech, ensuring all customers purchase their items without a second thought. The main purpose of this project is to guide customers who are unfamiliar with technology and provide high-quality products and services.
      </p>

      <h2>Who We Are For</h2>
      <p>
        Our target audience is diverse. While we mainly cater to <strong>students</strong> looking for the best deals, we are also dedicated to helping <strong>elderly people</strong>. 
      </p>
      <p>
        We understand that some customers might not be aware of exactly what kind of tech they are after. We bridge that gap, helping them find electronics at an affordable price that suit their specific lifestyle.
      </p>

      <div class="support-box">
        <h3>Need Help?</h3>
        <p>
          We pride ourselves on support. Our friendly live chat team is <strong>available 24/7</strong> to provide any support required.
        </p>
      </div>

    </div>


  </body>
</html>

