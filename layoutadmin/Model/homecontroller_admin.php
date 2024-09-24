<?php 
require 'Model/homemodel_admin.php';

class HomeController {
    public function __construct() {
        $sp = new Homemodel();
        $products = $sp->getAllProducts(); // Lấy danh sách sản phẩm
        $this->renderView('View/home.php', ['products' => $products]);
    }

    private function renderView($view, $data) {
        extract($data);
        include $view;
    }
}
?>
