<?php
require_once './layout/Model/usermodel.php';

class LoginController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showFormLogin()
    {
        include_once './layout/View/login.php';
    }

    public function showFormRegister()
    {
        include_once './layout/View/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];

            if ($email && $password) {
                $user = $this->userModel->login($email, $password);
                // var_dump($user);
                if ($user) {
                    $_SESSION['username'] = $user[0]['username'];
                    $_SESSION['userId'] = $user[0]['id'];

                    header("Location: index.php?trang=home");
                    exit();
                } else {
                    $_SESSION['error'] = "Invalid email or password.";
                }
            } else {
                $_SESSION['error'] = "Please enter a valid email and password.";
            }
            header("Location: index.php?trang=login");
            exit();
        }
    }

    public function logout()
    {
        unset($_SESSION['username']);
        header("Location: index.php?trang=home");
        exit();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($username && $email && $password && $password === $confirm_password) {
                if ($this->userModel->checkExistUser($email)) {
                    $_SESSION['error'] = "Email already exists.";
                } else {
                    $userId = $this->userModel->register($username, $email, $password);
                    if ($userId) {
                        header("Location: index.php?trang=login");
                        exit();
                    } else {
                        $_SESSION['error'] = "Registration failed.";
                    }
                }
            } else {
                if (!$username) {
                    $_SESSION['error'] = "Please enter a username.";
                } elseif (!$email) {
                    $_SESSION['error'] = "Please enter a valid email.";
                } elseif (!$password) {
                    $_SESSION['error'] = "Please enter a password.";
                } elseif ($password !== $confirm_password) {
                    $_SESSION['error'] = "Passwords do not match.";
                } else {
                    $_SESSION['error'] = "Please fill out all fields correctly.";
                }
            }
            header("Location: index.php?trang=register");
            exit();
        }
    }
}
