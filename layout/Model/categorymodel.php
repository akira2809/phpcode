<?php
class categorymodel {
    public $connectModel;

    public function __construct() {
        $this->connectModel = new ConnectModel();
    }

    public function getAllCat() {
        $sql = "Select * from category";
        return $this->connectModel->selectOne($sql);
    }
  
}
?>
 