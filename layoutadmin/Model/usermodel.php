<?php
class UserModel
{
    public $connectModel;

    public function __construct() {
        $this->connectModel = new ConnectModel();
    }

    public function getUserOne($id){
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->connectModel->selectOne($sql, [$id]);
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->connectModel->executeQuery($sql, [$id]);
    }
}
?>
