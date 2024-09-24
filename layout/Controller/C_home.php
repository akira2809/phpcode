<?php
class home
{
    public $listPro;
    public function getProductAll()
    {
        $pro = new Homemodel();
        $this->listPro = $pro->getAllProducts();
        $listCat = $this -> sort();
        include "./layout/View/home.php";
    }
    public function sort()
    {
        $pro = new categorymodel();
        $listCat = $pro->getAllCat();
        return $listCat;
    }
}
