<?php
class Homemodel {
    public $connectModel;

    public function __construct() {
        $this->connectModel = new ConnectModel();
    }

    public function getAllProducts() {
        return $this->connectModel->selectAll('products');
    }
    public function getAllCategories(){
        return $this->connectModel->selectAll('category');
    }
    public function getAllUsers(){
        return $this->connectModel->selectAll('users');
    }
}
?>
