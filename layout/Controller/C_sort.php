<?php
class sort{
    public function __construct(){
        
        $idCat = $_GET['idCat'];
        $model = new detailsort();
        $result = $model->productCat($idCat);
        // $CategorySame = $this->getCategorySame($idCat,$id);
        include "./layout/View/sort.php";
    }
    // public function getCategorySame($idCat,$id){
    //     $model = new detailmodel();
    //     $CategorySame = $model->getCategorySame($idCat,$id);
    //     return $CategorySame;
    // }
    
}
?>