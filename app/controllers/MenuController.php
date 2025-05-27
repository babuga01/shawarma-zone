<?php
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
            $menu[$cat['name']] = $this->model->getDishesByCategory($cat['id']);
        }

        return $menu;
    }
}
