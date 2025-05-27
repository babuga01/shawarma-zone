<?php 
require_once __DIR__ . '/../../config/db.php';
foreach ($dishes as $dish): ?>
  <div class="dish-card">
     <img src="//public/images/<?= htmlspecialchars($dish['image_url']) ?>" alt="<?= htmlspecialchars($dish['name']) ?>">
     <h3><?= htmlspecialchars($dish['name']) ?></h3>
     <p class="desc"><?= htmlspecialchars($dish['description']) ?></p>
     <div class="bottom">
       <span class="price">₦<?= number_format($dish['price'],2) ?></span>
       <button class="addCart" data-id="<?= $dish['id'] ?>">Add</button>
     </div>
  </div>
<?php endforeach; ?>
