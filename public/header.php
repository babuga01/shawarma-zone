<?php
$path = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Shawarma Zone - The best shawarma in town, served fast and fresh." />
  <link rel="icon" href="/public/images/favicon.png" type="image/png">
  <title>Shawarma Zone</title>

  <link rel="stylesheet" href="/public/css/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
<header class="topbar">
  <div class="logo">Shawarma <span>Zone</span></div>

  <!-- Mobile toggle -->
  <button class="menu-toggle" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Navigation Links -->
  <nav class="nav-links">
    <a href="/public/index.php" class="<?= $path === 'index.php' ? 'active' : '' ?>">Home</a>
    <a href="/public/menu.php" class="<?= $path === 'menu.php' ? 'active' : '' ?>">Menu</a>
    <a href="/public/about.php" class="<?= $path === 'about.php' ? 'active' : '' ?>">About</a>
  </nav>

  <!-- Search Bar -->
  <form class="search-bar" action="/public/menu.php" method="get">
    <input type="text" name="search" placeholder="Search shawarma..." aria-label="Search shawarma">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>

  <!-- Icons -->
  <div class="icons">
    <button id="contactBtn" title="Contact us" aria-label="Contact us">
      <i class="fa-solid fa-phone"></i>
    </button>
    <button id="cartBtn" title="Your order" aria-label="Your order">
      <i class="fa-solid fa-cart-shopping"></i><span id="cartCount">0</span>
    </button>
  </div>
</header>

<!-- Contact Drawer -->
<div id="contactDrawer" class="drawer">
  <h3>Contact us</h3>
  <p><i class="fa-solid fa-phone"></i> +234-800-000-0000</p>
  <p><i class="fa-solid fa-envelope"></i> support@shawarmazone.com</p>
</div>

<!-- Cart Drawer -->
<div id="cartDrawer" class="drawer">
  <h3>Your order</h3>
  <div id="cartItems">Cart is empty.</div>
  <button id="checkoutBtn" class="primary">Checkout</button>
</div>

<script src="/public/js/ui.js" defer></script>
<script>
  // Mobile toggle logic
  document.querySelector('.menu-toggle').addEventListener('click', () => {
    document.querySelector('.nav-links').classList.toggle('show');
  });
</script>
</body>
</html>
