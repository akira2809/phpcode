<?php
// include "Model/detailmodel.php";
class detail{
    public function __construct(){
        $id = $_GET['id'];
        $idCat = $_GET['idCat'];
        $model = new detailmodel();
        $result = $model->getOneProduct($id);
        $CategorySame = $this->getCategorySame($idCat,$id);
        include "./layout/View/detail.php";
    }
    public function getCategorySame($idCat,$id){
        $model = new detailmodel();
        $CategorySame = $model->getCategorySame($idCat,$id);
        return $CategorySame;
    }
    
}
?>