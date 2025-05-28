<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /public/login.php');
    exit();
}

include 'header.php';
require_once __DIR__ . '/../app/controllers/MenuController.php';
require_once __DIR__ . '/../config/db.php';

$controller = new MenuController();
$menu = $controller->getMenu();
?>

<section class="menu-section">
  <h2 class="section-title">Our Menu</h2>

  <!-- category tabs -->
  <div class="tabs" id="menuTabs">
     <?php $i=0; foreach ($menu as $cat => $dishes): ?>
        <button
           class="tab <?= $i===0 ? 'active':'' ?>"
           data-cat="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
     <?php $i++; endforeach; ?>
  </div>

  <!-- dish grids -->
  <?php foreach ($menu as $cat => $dishes): ?>
     <div class="dish-grid" data-cat="<?= htmlspecialchars($cat) ?>">
        <?php include __DIR__ . '/../app/views/menu-grid.php'; ?>
     </div>
  <?php endforeach; ?>
</section>

<script>
 // JS tab switcher (simple)
 document.querySelectorAll('.tab').forEach(btn=>{
   btn.addEventListener('click', e=>{
      document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
      btn.classList.add('active');

      document.querySelectorAll('.dish-grid').forEach(g=>{
         g.style.display = g.dataset.cat === btn.dataset.cat ? 'flex' : 'none';
      });
   });
 });
 // Show only first category grid at start
 document.querySelectorAll('.dish-grid').forEach((g,i)=> g.style.display = i===0?'flex':'none');
</script>

<?php include 'footer.php'; ?>
