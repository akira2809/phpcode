<?php
class ProductModel {
    public $connectModel;

    public function __construct() {
        $this->connectModel = new ConnectModel();
    }

    public function addProduct($NAME, $description, $picture, $price, $id) {
        $sql = "INSERT INTO products (NAME, description, picture, price, idCat) VALUES (?, ?, ?, ?, ?)";
        return $this->connectModel->executeQuery($sql, [$NAME, $description, $picture, $price, $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->connectModel->executeQuery($sql, [$id]);
    }

    public function editProduct($NAME, $description, $picture, $price,$idCat, $id) {
        $sql = "UPDATE products SET NAME = ?, description = ?, picture = ?, price = ? , idCat = ? WHERE id = ?";
        return $this->connectModel->executeQuery($sql, [$NAME, $description, $picture, $price,$idCat, $id]);
    }

    public function deleteCategory($id) {
        // First delete products linked to the category
        $sql = "DELETE FROM products WHERE idCat = ?";
        $this->connectModel->executeQuery($sql, [$id]);
        // Then delete the category
        $sql = "DELETE FROM category WHERE id = ?";
        return $this->connectModel->executeQuery($sql, [$id]);
    }

    public function addCategory($id, $NAME) {
        $sql = "INSERT INTO category (id, NAME) VALUES (?, ?)";
        // $sql = "INNER "
        return $this->connectModel->executeQuery($sql, [$id, $NAME]);
    }

    public function editCategory($name, $id) {
        $sql = "UPDATE category SET NAME = ? WHERE id = ?";
        return $this->connectModel->executeQuery($sql, [$name, $id]);
    }
    

    
    public function getCategoryById($id) {
        $sql = "SELECT * FROM category WHERE id = ?";
        return $this->connectModel->selectOne($sql, [$id]);
    }
    public function getProductByName($name){
        $sql = "SELECT * FROM products WHERE NAME = ?";
        return $this->connectModel->selectOne($sql,[$name]);
    }
    public function getProductOne($id){
        $sql ="SELECT * FROM products WHERE id=?";
        return $this -> connectModel ->selectOne($sql,[$id]);
    }
    public function getProductCountByCategory($categoryId) {
        $sql = "SELECT COUNT(*) as product_count FROM products WHERE idCat = ?";
        $result = $this->connectModel->selectOne($sql, [$categoryId]);
        return $result['product_count'];
    }
    public function checkimage($picture) {
       $sql = "SELECT * From products where picture = ?";
       return $this->connectModel->executeQuery($sql,[$picture]);
    }
    
}
?>
