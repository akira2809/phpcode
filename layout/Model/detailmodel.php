<?php
class detailmodel {
    public $connectModel;

    public function __construct() {
        $this->connectModel = new ConnectModel();
    }

    public function getAllProducts() {
        return $this->connectModel->selectAll('products');
    }
    public function getOneProduct($id){
        $sql = "SELECT * from products where id = ?";
        return $this->connectModel->selectOne($sql , [$id]);
    }
    public function productCat($id){
        $sql = "SELECT * from products where idCat = ?";
        return $this->connectModel->selectOne($sql , [$id]);
    }
    public function getCategorySame($idCat,$id){
        $sql = "SELECT * from products where idCat = ? and not id = ?";
        return $this->connectModel->selectOne($sql , [$idCat,$id]);
    }

}
?>
 