<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Products | Game Store</title>

<style>
/* (your entire CSS stays unchanged) */
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
}

.product-name{
  font-size:1.05rem;
  font-weight:600;
}

.product-price{
  font-weight:600;
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
<body>

<nav>
  <div class="logo">
    <img src="images/index/Logo.jpg" alt="Tech4ForU Logo">
  </div>

  <ul>
    <li><a href="{{ route('product') }}">Product Page</a></li>
    <li><a href="{{ route('about') }}">About Us</a></li>
    <li><a href="{{ route('contact') }}">Contact Us</a></li>
    <li><a href="{{ route('profile') }}"><span class="nav-icon">👤</span> Profile</a></li>
    <li><a href="{{ route('cart') }}"><span class="nav-icon">🛒</span> Cart</a></li>
  </ul>
</nav>

<section class="hero">
  <h1>Discover your product choices</h1>
  <p>Find what you need - Faster</p>
</section>

<h2 class="section-title">All Products</h2>

<div class="product-grid" id="productGrid">
  @forelse ($products as $product)
      <div
        class="product-card"
        data-name="{{ strtolower($product->productName) }}"
        data-description="{{ strtolower($product->description ?? '') }}"
      >
        <div class="product-name">{{ $product->productName }}</div>
        <div class="product-description">{{ $product->description ?? 'No description available.' }}</div>
        <div class="product-bottom">
          <div class="product-price">£{{ number_format($product->price, 2) }}</div>
          <div class="product-hint">In stock: {{ $product->stockQuantity }}</div>
        </div>
      </div>
  @empty
      <p style="padding: 0 8% 40px;">No products available.</p>
  @endforelse
</div>

<div class="no-results" id="noResults">
  No products matched your search.
</div>

<script>
const searchInput   = document.getElementById('searchInput');
const productCards  = document.querySelectorAll('.product-card');
const noResults     = document.getElementById('noResults');

function applyFilters() {
  const query = searchInput.value.trim().toLowerCase();
  let visibleCount = 0;

  productCards.forEach(card => {
    const name        = card.dataset.name || '';
    const description = card.dataset.description || '';

    const visible =
      !query ||
      name.includes(query) ||
      description.includes(query);

    card.style.display = visible ? 'flex' : 'none';
    if (visible) visibleCount++;
  });

  noResults.style.display = visibleCount === 0 ? 'block' : 'none';
}

searchInput.addEventListener('input', applyFilters);
applyFilters();
</script>

</body>
</html>
