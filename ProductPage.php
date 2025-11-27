<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Products | Game Store</title>

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
  padding:60px 8% 40px;
  background:#eaf1ff;
  display:flex;
  flex-direction:column;
  gap:15px;
}

.hero h1{
  font-size:2.4rem;
  max-width:600px;
}

.hero p{
  font-size:1.05rem;
  max-width:520px;
  color:#444;
}

.section-title{
  text-align:left;
  font-size:1.4rem;
  margin-top:20px;
  margin-bottom:15px;
  padding:0 8%;
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
  background:white;
  color:#444;
  outline:none;
  font-size:.95rem;
}

.search-wrapper input::placeholder{
  color:#999;
}

.search-icon{
  position:absolute;
  left:10px;
  top:50%;
  transform:translateY(-50%);
  font-size:.9rem;
  color:#999;
}

.filters{
  display:flex;
  flex-wrap:wrap;
  gap:8px;
}

.filter-btn{
  padding:8px 14px;
  border-radius:999px;
  border:1px solid #ccc;
  background:white;
  color:#444;
  cursor:pointer;
  font-size:.85rem;
  transition:.3s;
}

.filter-btn:hover{
  border-color:#0077ff;
  color:#0077ff;
}

.filter-btn.active{
  background:#0077ff;
  color:white;
  border-color:#0077ff;
}

.product-grid{
  width:100%;
  padding:10px 8% 50px;
  display:grid;
  gap:24px;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
}

.product-card{
  padding:22px 22px 18px;
  border-radius:12px;
  background:white;
  border:1px solid #eee;
  transition:.3s;
  cursor:pointer;
  display:flex;
  flex-direction:column;
  gap:8px;
}

.product-card:hover{
  transform:translateY(-4px);
  box-shadow:0 12px 32px rgba(0,0,0,0.06);
}

.product-category{
  font-size:.75rem;
  text-transform:uppercase;
  letter-spacing:.08em;
  color:#888;
}

.product-name{
  font-size:1.05rem;
  font-weight:600;
}

.product-description{
  font-size:.9rem;
  color:#555;
  min-height:40px;
}

.product-extra{
  font-size:.78rem;
  color:#777;
}

.product-bottom{
  margin-top:10px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  font-size:.9rem;
}

.product-price{
  font-weight:600;
  color:#111;
}

.product-hint{
  font-size:.8rem;
  color:#999;
}

.no-results{
  width:100%;
  padding:0 8% 40px;
  text-align:center;
  color:#777;
  display:none;
}


.modal-overlay{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.35);
  display:none;
  align-items:center;
  justify-content:center;
  z-index:50;
}

.modal{
  width:90%;
  max-width:420px;
  background:white;
  border-radius:12px;
  padding:20px 22px;
  box-shadow:0 18px 40px rgba(0,0,0,0.15);
}

.modal-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:10px;
}

.modal-header h3{
  font-size:1.1rem;
  color:#333;
}

.modal-close{
  border:none;
  background:transparent;
  font-size:1.2rem;
  cursor:pointer;
  color:#999;
}

.modal-body p{
  font-size:.9rem;
  color:#555;
  margin-bottom:12px;
}

.platform-buttons{
  display:flex;
  flex-wrap:wrap;
  gap:8px;
  margin-bottom:10px;
}

.platform-btn{
  padding:7px 12px;
  border-radius:999px;
  border:1px solid #0077ff;
  background:white;
  color:#0077ff;
  cursor:pointer;
  font-size:.85rem;
  transition:.2s;
}

.platform-btn:hover{
  background:#0077ff;
  color:white;
}

.selection-output{
  font-size:.85rem;
  color:#333;
}

@media (max-width:768px){
  .product-toolbar{
    flex-direction:column;
    align-items:stretch;
  }
  .filters{
    justify-content:center;
  }
}

</style>

</head>
<body>

<nav>
  <div class="logo">
    <img src="lilmanhaider/team-40/images/index/Logo.jpg" alt="Tech4ForU Logo">
  </div>

  <ul>
    <li><a href="ProductPage.php">Product Page</a></li>
    <li><a href="AboutUs.php">About Us</a></li>
    <li><a href="ContactUs.php">Contact Us</a></li>


    <li>
      <a href="profile.php">
        <span class="nav-icon">👤</span>
        Profile
      </a>
    </li>

    <li>
      <a href="cart.php">
        <span class="nav-icon">🛒</span>
        Cart
      </a>
    </li>
  </ul>
</nav>

<section class="hero">
  <h1>Discover your product choices</h1>
  <p1> Find what you need - Faster </p1>

<div class="product-toolbar">
  <div class="search-wrapper">
    <span class="search-icon">🔍</span>
    <input
      type="text"
      id="searchInput"
      placeholder="Search products (PS5, GTA 5, controller...)"
    />
  </div>

  <div class="filters">
    <button class="filter-btn active" data-category="all">All</button>
    <button class="filter-btn" data-category="console">Consoles</button>
    <button class="filter-btn" data-category="game">Games</button>
    <button class="filter-btn" data-category="accessory">Accessories</button>
    <button class="filter-btn" data-category="service">Software Services</button>
  </div>
</div>

<h2 class="section-title">All Products</h2>

<div class="product-grid" id="productGrid">
  <?php foreach ($products as $product): ?>
    <?php
      $id          = (int)$product['id'];
      $name        = $product['name'] ?? '';
      $category    = $product['category'] ?? '';
      $description = $product['description'] ?? '';
      $price       = isset($product['price']) ? (float)$product['price'] : 0;
      $platforms   = $product['platforms'] ?? ''; // e.g. "ps5,xbox_series_x"

      $platformArray = array_filter(array_map('trim', explode(',', $platforms)));

      // Pretty category label
      $catLabel = match($category) {
        'console'   => 'Console',
        'game'      => 'Game',
        'accessory' => 'Accessory',
        'service'   => 'Software Service',
        default     => ucfirst($category)
      };

      // Lowercase data for search
      $searchName = strtolower($name);
      $searchDesc = strtolower($description);
    ?>
    <div
      class="product-card"
      data-category="<?php echo h($category); ?>"
      data-name="<?php echo h($searchName); ?>"
      data-description="<?php echo h($searchDesc); ?>"
      data-platforms="<?php echo h($platforms); ?>"
    >
      <div class="product-category"><?php echo h($catLabel); ?></div>
      <div class="product-name"><?php echo h($name); ?></div>

      <div class="product-description">
        <?php echo $description ? h($description) : 'No description available.'; ?>
      </div>

      <?php if ($category === 'game' && !empty($platformArray)): ?>
        <div class="product-extra">
          Available for:
          <?php
            $labels = [];
            foreach ($platformArray as $p) {
              $labels[] = match($p) {
                'ps5'               => 'PS5',
                'xbox_series_x'     => 'Xbox Series X',
                'xbox_series_s'     => 'Xbox Series S',
                'xbox'              => 'Xbox Series X|S',
                'switch2'           => 'Nintendo Switch 2',
                default             => ucfirst($p),
              };
            }
            echo h(implode(', ', $labels));
          ?>
        </div>
      <?php elseif ($category === 'accessory' && !empty($platformArray)): ?>
        <div class="product-extra">
          For:
          <?php echo h(implode(', ', $platformArray)); ?>
        </div>
      <?php endif; ?>

      <div class="product-bottom">
        <div class="product-price">£<?php echo number_format($price, 2); ?></div>
        <div class="product-hint">
          <?php if ($category === 'game'): ?>
            Click to choose console
          <?php else: ?>
            Click for details
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<div class="no-results" id="noResults">
  No products matched your search/filter.
</div>

<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <div class="modal-header">
      <h3 id="modalTitle">Choose console</h3>
      <button class="modal-close" id="modalCloseBtn" aria-label="Close">&times;</button>
    </div>
    <div class="modal-body">
      <p id="modalDescription">Select which console you want this game for:</p>
      <div class="platform-buttons" id="platformButtons"></div>
      <div class="selection-output" id="selectionOutput"></div>
    </div>
  </div>
</div>


<script>
  const searchInput   = document.getElementById('searchInput');
  const filterButtons = document.querySelectorAll('.filter-btn');
  const productGrid   = document.getElementById('productGrid');
  const productCards  = document.querySelectorAll('.product-card');
  const noResults     = document.getElementById('noResults');

  const modalOverlay      = document.getElementById('modalOverlay');
  const modalCloseBtn     = document.getElementById('modalCloseBtn');
  const modalTitle        = document.getElementById('modalTitle');
  const modalDescription  = document.getElementById('modalDescription');
  const platformButtonsEl = document.getElementById('platformButtons');
  const selectionOutput   = document.getElementById('selectionOutput');

  let currentCategory = 'all';

  function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();
    let visibleCount = 0;

    productCards.forEach(card => {
      const cardCategory = card.dataset.category;
      const name         = card.dataset.name || '';
      const description  = card.dataset.description || '';

      const matchesCategory = (currentCategory === 'all' || cardCategory === currentCategory);
      const matchesSearch   =
        !query ||
        name.includes(query) ||
        description.includes(query);

      const visible = matchesCategory && matchesSearch;
      card.style.display = visible ? 'flex' : 'none';
      if (visible) visibleCount++;
    });

    noResults.style.display = visibleCount === 0 ? 'block' : 'none';
  }

  
  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      currentCategory = btn.dataset.category;
      applyFilters();
    });
  });

  // Search button
  searchInput.addEventListener('input', applyFilters);

  // product button
  productGrid.addEventListener('click', (e) => {
    const card = e.target.closest('.product-card');
    if (!card) return;

    const category = card.dataset.category;
    const name     = card.querySelector('.product-name')?.textContent || 'Game';

    if (category === 'game') {
      openGameModal(card, name);
    } else {
      alert(`Product: ${name}\nCategory: ${category.toUpperCase()}`);
    }
  });

  // Open modal for game
  function openGameModal(card, name) {
    const platformsStr = card.dataset.platforms || '';
    const platforms = platformsStr
      .split(',')
      .map(p => p.trim())
      .filter(Boolean);

    modalTitle.textContent = name;
    modalDescription.textContent = 'Select which console you want this game for:';
    platformButtonsEl.innerHTML = '';
    selectionOutput.textContent = '';

    if (platforms.length === 0) {
      selectionOutput.textContent = 'No platforms listed for this game.';
    } else {
      platforms.forEach(p => {
        const btn = document.createElement('button');
        btn.className = 'platform-btn';

        let label;
        switch (p) {
          case 'ps5':           label = 'PS5'; break;
          case 'xbox_series_x': label = 'Xbox Series X'; break;
          case 'xbox_series_s': label = 'Xbox Series S'; break;
          case 'xbox':          label = 'Xbox Series X|S'; break;
          case 'switch2':       label = 'Nintendo Switch 2'; break;
          default:              label = p.charAt(0).toUpperCase() + p.slice(1);
        }

        btn.textContent = label;
        btn.addEventListener('click', () => {
          selectionOutput.textContent = `You selected "${name}" for ${label}.`;
        });

        platformButtonsEl.appendChild(btn);
      });
    }

    modalOverlay.style.display = 'flex';
  }

  function closeModal() {
    modalOverlay.style.display = 'none';
  }

  modalCloseBtn.addEventListener('click', closeModal);
  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) closeModal();
  });

  // apply fliter
  applyFilters();
</script>

</body>
</html>
