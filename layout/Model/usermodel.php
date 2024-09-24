<?php
require_once './layout/Model/ConnectModel.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new ConnectModel();
    }

    public function register($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $params = [
            ':username' => $username,
            ':password' => $hashedPassword,
            ':email' => $email
        ];
        return $this->db->executeQuery($sql, $params);
    }

    public function checkExistUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email];
        return $this->db->selectOne($sql, $params);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email];
        $user = $this->db->selectOne($sql, $params);

        if ($user && password_verify($password, $user[0]['password'])) {
            return $user;
        }
        return false;
    }
}
