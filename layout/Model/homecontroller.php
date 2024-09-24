<?php 
require './layout/Model/homemodel.php';

class HomeController {
    public function __construct() {
        $sp = new Homemodel();
        $products = $sp->getAllProducts(); // Lấy danh sách sản phẩm
        $this->renderView('View/home.php', ['products' => $products]);

        $id = $sp->getOneProducts($id); // Lấy danh sách id sản phẩm
        $this->renderView('View/home.php', ['products' ,'$id' => $id]);
        
    }

    private function renderView($view, $data) {
        extract($data);
        include $view;
    }
}
?>
