<?php
class Homemodel {
    private $connectModel;

    public function __construct() {
        $this->connectModel = new ConnectModel();
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts() {
        return $this->connectModel->selectAll('products');
    }

    // Lấy một sản phẩm dựa trên ID
    public function getOneProduct($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        return $this->connectModel->selectOne($sql, ['id' => $id]);
    }

    // Tìm kiếm sản phẩm theo tên
    public function searchProductsByName($searchQuery) {
        $sql = "SELECT * FROM products WHERE NAME LIKE :name";
        $params = ['name' => "%" . $searchQuery . "%"];
        return $this->connectModel->selectOne($sql, $params);
    }
}
?>
