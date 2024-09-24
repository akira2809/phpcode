<?php
require_once './layout/Model/connectmodel.php';

class CheckoutModel {
    private $db;

    public function __construct() {
        $this->db = new ConnectModel();
    }

    public function checkout($productId, $quantity) {
        $sql = "INSERT INTO detailorder (idproducts, quantity) VALUES (:idproducts, :quantity)";
        $params = [':idproducts' => $productId, ':quantity' => $quantity];
        $this->db->executeQuery($sql, $params);
    }
}
?>
