<?php
class shop
{
    public $listPro;
    public function getProductAll()
    {
        $pro = new Homemodel();
        $this->listPro = $pro->getAllProducts();
        $listCat = $this -> sort();
        include "./layout/View/shop.php";
    }
    public function sort()
    {
        $pro = new categorymodel();
        $listCat = $pro->getAllCat();
        return $listCat;
    }
}
