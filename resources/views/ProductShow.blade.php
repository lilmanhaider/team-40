<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $product->name }}</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #eef2f7, #f8fafc);
    color: #111;
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

/* CENTER WRAPPER */
.page-wrapper {
    display: flex;
    justify-content: center;
    padding: 40px 20px;
}

/* CARD */
.container {
    max-width: 1100px;
    width: 100%;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    overflow: hidden;
}

/* GRID */
.product-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    padding: 40px;
}

/* IMAGE */
.product-image img {
    width: 100%;
    border-radius: 14px;
    object-fit: cover;
    max-height: 420px;
}

/* DETAILS */
.product-details h1 {
    font-size: 30px;
    margin-bottom: 10px;
}

.product-details p {
    margin: 10px 0;
    line-height: 1.5;
}

.price {
    font-size: 1.9rem;
    font-weight: bold;
    color: #2563eb;
    margin: 15px 0;
}

.category {
    display: inline-block;
    background: #e0e7ff;
    color: #3730a3;
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 12px;
    margin-bottom: 10px;
}

/* BUTTON */
.btn {
    display: inline-block;
    padding: 12px 18px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.2s ease;
}

.btn-primary {
    background: #2563eb;
    color: white;
}

.btn-primary:hover {
    background: #1d4ed8;
    transform: translateY(-2px);
}

/* REVIEWS */
.reviews {
    padding: 40px;
    border-top: 1px solid #eee;
}

.reviews h2 {
    margin-bottom: 20px;
}

.review-card {
    padding: 16px;
    border-radius: 12px;
    background: #f9fafb;
    margin-bottom: 15px;
    transition: 0.2s;
}

.review-card:hover {
    background: #f1f5f9;
}

.review-header {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    margin-bottom: 5px;
}

.rating {
    color: #f59e0b;
}

/* FORM */
.form-section {
    margin-top: 30px;
}

textarea, select {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    outline: none;
}

textarea:focus, select:focus {
    border-color: #2563eb;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: 1fr;
        padding: 20px;
    }

    .reviews {
        padding: 20px;
    }
}
</style>
</head>

<body>

<nav>
    @include('nav')
</nav>

<div class="page-wrapper">
    <div class="container">

        <div class="product-grid">

            <!-- IMAGE -->
            <div class="product-image">
                @if($product->image)
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->productName }}">
                @else
                    <img src="https://via.placeholder.com/500x400" alt="No image">
                @endif
            </div>

            <!-- DETAILS -->
            <div class="product-details">
                <span class="category">{{ $product->category }}</span>
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p class="price">£{{ $product->price }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">🛒 Add to Cart</button>
                </form>
            </div>

        </div>

        <!-- REVIEWS -->
        <div class="reviews">
            <h2>⭐ Customer Reviews</h2>

            @forelse($reviews as $review)
                <div class="review-card">
                    <div class="review-header">
                        <span>{{ $review->user->name }}</span>
                        <span class="rating">{{ str_repeat('⭐', $review->rating) }}</span>
                    </div>
                    <p>{{ $review->body }}</p>
                    <small>{{ $review->created_at->diffForHumans() }}</small>
                </div>
            @empty
                <p>No reviews yet. Be the first to leave one!</p>
            @endforelse

            @auth
            <div class="form-section">
                <h3>Leave a Review</h3>

                <form action="{{ route('reviews.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <label>Rating</label>
                    <select name="rating" required>
                        <option value="">Select rating</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>

                    <label>Your Review</label>
                    <textarea name="body" rows="4" placeholder="Write your thoughts..."></textarea>

                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
            @else
                <p><a href="{{ route('login') }}">Log in</a> to leave a review.</p>
            @endauth

        </div>

    </div>
</div>

</body>
</html>