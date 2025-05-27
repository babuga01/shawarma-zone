<?php
require_once __DIR__ . '/../Models/MenuModel.php';

header('Content-Type: application/json');

$menuModel = new MenuModel();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['category_id'])) {
        // Fetch dishes by category
        $categoryId = intval($_GET['category_id']);
        $data = $menuModel->getDishesByCategory($categoryId);
    } else {
        // Fetch all categories
        $data = $menuModel->getCategories();
    }
    echo json_encode($data);
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Invalid request method']);
}
?>
