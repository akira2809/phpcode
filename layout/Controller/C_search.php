<?php
class ProductController {
    private $listPro = [];

    public function search() {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchQuery = htmlspecialchars($_GET['search'], ENT_QUOTES);
            $model = new Homemodel();
            $this->listPro = $model->searchProductsByName($searchQuery);
        } else {
            $this->listPro = [];
        }

        // Nếu yêu cầu là AJAX, chỉ trả về phần kết quả
        if (!empty($_GET['search'])) {
            require_once "./layout/View/search_results.php";
            exit;
        }

        require_once "./layout/View/products.php";
    }
}
?>
