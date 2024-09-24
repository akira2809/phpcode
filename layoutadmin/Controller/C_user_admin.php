<?php
require_once "Model/UserModel.php"; // Ensure this path is correct

class Users {
    public $users;

    public function getAllUsers() {
        $model = new Homemodel();
        $this->users = $model->getAllUsers();
        include "view/user.php";
    }

    public function deleteUser() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            echo "Deleting user with ID: " . $id . "<br>";
            $model = new UserModel();
            $user = $model->getUserOne($id);
            var_dump($user);

            if ($user && $model->deleteUser($id)) {
                if (!empty($user['picture'])) {
                    unlink('../' . $user['picture']);
                }
                header("Location: /layoutadmin/index.php?trang=user");
                exit();
            } else {
                echo "Failed to delete user.";
            }
        } else {
            echo "User ID not set.";
        }
    }
}
?>
