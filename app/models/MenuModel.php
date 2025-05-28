<?php
require_once __DIR__ . '/../../config/db.php';

class MenuModel {
    public function getCategories() {
        global $conn;
        $sql = "SELECT * FROM categories";
        return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getDishesByCategory($categoryId) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM dishes WHERE category_id = ? AND is_active = 1");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
