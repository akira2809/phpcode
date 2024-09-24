<?php
require_once './layout/Model/ConnectModel.php';

class CartModel {
    private $db;

    public function __construct() {
        $this->db = new ConnectModel();
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $params = [':id' => $productId];
        return $this->db->selectOne($sql, $params);
    }
    function addProductBill($billId, $proId, $quantity, $price)
    {
        $sql = "INSERT INTO detailorder(idorder, idproducts, quantity,price) VALUES(?,?,?,?)";
        return $this->db->executeQuery($sql, [$billId, $proId, $quantity, $price]);
    }
    public function addUserBill($userId) {
        $sql = "INSERT INTO `orders` (userID) VALUES (:userID)";
        $params = ['userID' => $userId];
        return $this->db->insert($sql, $params);
    }
    
}
?>
