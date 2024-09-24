<?php
require_once "Model/connectmodel.php";
require_once "Model/homemodel_admin.php";
require_once "View/header.php";
require_once "Model/productmodel.php";
require_once "Model/UserModel.php"; // Include UserModel.php here as well

$page = isset($_GET['trang']) ? $_GET['trang'] : 'home';

switch ($page) {
    case 'home':
        require_once "Controller/C_home_admin.php";
        $home = new home();
        break;
    case 'products':
        require_once "Controller/C_product_admin.php";
        $products = new Product();
        $products->getProductAll();
        break;
    case 'editproduct':
        require_once "Controller/C_product_admin.php";
        $edit = new Product();
        $edit->view();
        break;
    case 'addproduct':
        require_once "Controller/C_product_admin.php";
        $add = new Product();
        $add->fix();
        break;
    case 'category':
        require_once "Controller/C_product_admin.php";
        $products = new Product();
        $products->getAllCategories();
        break;
    case 'editcategory':
        require_once "Controller/C_product_admin.php";
        $products = new Product();
        $products->viewCate();
        break;
    case 'addcategory':
        require_once "Controller/C_product_admin.php";
        $products = new Product();
        $products->fixCate();
        break;
    case 'deletecategory':
        require_once "View/deleteCategory.php";
        break;
    case 'user':
        require_once "Controller/C_user_admin.php";
        $users = new Users();
        $users->getAllUsers();
        break;
    case 'deleteuser':
        require_once "Controller/C_user_admin.php";
        $users = new Users();
        $users->deleteUser();
        break;
    case 'checkoutadmin';
        require_once "View/checkoutadmin.php";
        break;
    default:
        echo "Trang không tồn tại.";
        break;
}
?>
