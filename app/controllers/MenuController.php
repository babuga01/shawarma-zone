<?php
require_once __DIR__ . '/../Models/MenuModel.php';
use App\Models\MenuModel;
require_once __DIR__ . '/../models/MenuModel.php';
require_once __DIR__ . '/../../config/db.php';


class MenuController {
    private $model;

    public function __construct() {
        $this->model = new MenuModel();
    }

    public function getMenu() {
        $categories = $this->model->getCategories();
        $menu = [];

        foreach ($categories as $cat) {
            $dishes = $this->model->getDishesByCategory($cat['id']);
            if (!empty($dishes)) {
                $menu[$cat['name']] = $dishes;
            }
        }

        return $menu;
    }

    public function getCategoryDishes($categoryId) {
        return $this->model->getDishesByCategory($categoryId);
    }
}
