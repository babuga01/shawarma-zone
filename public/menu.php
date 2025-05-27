<?php
include 'header.php';
require_once __DIR__ . '/../app/Controllers/MenuController.php';

$controller = new MenuController();
$menu = $controller->getMenu();
?>

<section class="menu-section">
  <h2 class="section-title">Our Menu</h2>

  <!-- Search Bar -->
  <div class="search-container">
    <input type="text" id="menuSearch" placeholder="Search for a dish...">
  </div>

  <!-- Category Tabs -->
  <div class="tabs" id="menuTabs">
     <?php $i=0; foreach ($menu as $cat => $dishes): ?>
        <button
           class="tab <?= $i===0 ? 'active' : '' ?>"
           data-cat="<?= htmlspecialchars($cat) ?>">
           <?= htmlspecialchars($cat) ?>
        </button>
     <?php $i++; endforeach; ?>
  </div>

  <!-- Dish Grids -->
  <?php foreach ($menu as $cat => $dishes): ?>
     <div class="dish-grid" data-cat="<?= htmlspecialchars($cat) ?>">
        <?php include __DIR__ . '/../app/Views/menu-grid.php'; ?>
     </div>
  <?php endforeach; ?>
</section>

<!-- Updated Styles -->
<style>
.search-container {
  margin-bottom: 20px;
  text-align: center;
}

#menuSearch {
  width: 80%;
  padding: 10px;
  font-size: 16px;
  border: 2px solid #ff6600;
  border-radius: 5px;
  outline: none;
}

.tabs .tab {
  transition: background-color 0.3s ease-in-out, transform 0.2s ease;
}

.tabs .tab.active {
  background-color: #ff6600;
  transform: scale(1.05);
}

.dish-grid {
  display: none;
  opacity: 0;
  transform: translateY(-10px);
  transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
}

.dish-grid.show {
  display: flex;
  opacity: 1;
  transform: translateY(0);
}

.dish-grid.hide {
  opacity: 0;
  transform: translateY(-10px);
}
</style>

<!-- Updated JavaScript -->
<script>
document.querySelectorAll('.tab').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('.dish-grid').forEach(g => {
      if (g.dataset.cat === btn.dataset.cat) {
        g.classList.add('show');
        g.classList.remove('hide');
        g.style.display = 'flex';
      } else {
        g.classList.add('hide');
        setTimeout(() => g.style.display = 'none', 500);
      }
    });
  });
});

// Initialize first category grid on page load
document.querySelectorAll('.dish-grid').forEach((g, i) => {
  if (i === 0) {
    g.classList.add('show');
    g.style.display = 'flex';
  } else {
    g.classList.add('hide');
  }
});

// Search functionality via API
document.getElementById('menuSearch').addEventListener('keyup', function () {
  let searchQuery = this.value.toLowerCase();
  fetch('/api/MenuAPI.php')
    .then(response => response.json())
    .then(data => {
      document.querySelectorAll('.dish-grid').forEach(grid => {
        let matches = false;
        grid.querySelectorAll('.dish-item').forEach(dish => {
          let dishName = dish.textContent.toLowerCase();
          if (dishName.includes(searchQuery)) {
            dish.style.display = 'block';
            matches = true;
          } else {
            dish.style.display = 'none';
          }
        });
        grid.style.display = matches ? 'flex' : 'none';
      });
    })
    .catch(error => console.error('Error fetching menu data:', error));
});
</script>

<?php include 'footer.php'; ?>
