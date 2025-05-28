<?php
namespace App\Models;

require_once __DIR__ . '/../../config/db.php';

use mysqli;

class MenuModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getCategories() {
        $sql = "SELECT id, name FROM categories";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute()) {
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Return an empty array on failure
        }
    }

    public function getDishesByCategory($categoryId) {
        $sql = "SELECT * FROM dishes WHERE category_id = ? AND is_active = 1";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $categoryId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Return an empty array if query fails
        }
    }
}
