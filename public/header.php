<?php
// current page detection for active link styling
$path = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shawarma Zone</title>
  <link rel="stylesheet" href="css/main.css">
  <!-- Font-Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<header class="topbar">
  <div class="logo">Shawarma <span>Zone</span></div>

  <nav>
    <a href="index.php"   class="<?= $path==='index.php' ? 'active':'' ?>">Home</a>
    <a href="menu.php"    class="<?= $path==='menu.php'  ? 'active':'' ?>">Menu</a>
    <a href="about.php"   class="<?= $path==='about.php' ? 'active':'' ?>">About</a>
  </nav>

  <div class="icons">
      <!-- Contact -->
      <button id="contactBtn" title="Contact us">
          <i class="fa-solid fa-phone"></i>
      </button>
      <!-- Cart -->
      <button id="cartBtn" title="Your order">
          <i class="fa-solid fa-cart-shopping"></i><span id="cartCount">0</span>
      </button>
  </div>
</header>

<!-- Hidden drawers -->
<div id="contactDrawer" class="drawer">
   <h3>Contact us</h3>
   <p><i class="fa-solid fa-phone"></i> +234-800-000-0000</p>
   <p><i class="fa-solid fa-envelope"></i> support@shawarmazone.com</p>
</div>

<div id="cartDrawer" class="drawer">
   <h3>Your order</h3>
   <div id="cartItems">Cart is empty.</div>
   <button id="checkoutBtn" class="primary">Checkout</button>
</div>
<script src="js/ui.js" defer></script>
