<?php
session_start();
ob_start();
include_once "./layout/Model/connectmodel.php";
include_once "./layout/Model/homemodel.php";

// Kiểm tra trang hiện tại
$page = isset($_GET['trang']) ? $_GET['trang'] : 'home';

// Chỉ bao gồm header nếu không phải là trang products
if ($page !== 'products') {
    include_once "./layout/View/header.php";
}
// echo $_SESSION['username'];
if($page)
require_once "./layout/Model/categorymodel.php";
require_once "./layout/Model/detailmodel.php";
require_once "./layout/Model/sortmodel.php";
require_once "./layout/Model/usermodel.php";
require_once "./layout/Model/cartmodel.php"; // Đảm bảo rằng đường dẫn này chính xác

$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Xử lý form đăng nhập
if (isset($_POST['login'])) {
    include_once "./layout/Controller/C_login.php";
    $controller = new LoginController();
    $controller->login();
}

// Xử lý form đăng ký
if (isset($_POST['register'])) {
    include_once "./layout/Controller/C_login.php";
    $controller = new LoginController();
    $controller->register();
}

// Xử lý thêm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    include_once "./layout/Controller/C_cart.php";
    $controller = new CartController();
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $controller->addToCart($productId, $quantity);
}

// Xử lý xóa khỏi giỏ hàng
if (isset($_POST['remove'])) {
    include_once "./layout/Controller/C_cart.php";
    $controller = new CartController();
    $productId = $_POST['product_id'];
    $controller->removeFromCart($productId);
}

// Chuyển hướng trang dựa trên tham số 'trang'
switch ($page) {
    case 'home':
        include_once "./layout/Controller/C_home.php";
        $home = new Home();
        $home->getProductAll();
        break;
    case 'detail':
        include_once "./layout/Controller/C_detail.php";
        $detail = new Detail();
        break;
    case 'sort':
        include_once "./layout/Controller/C_sort.php";
        $sort = new Sort();
        break;
    case 'login':
        include_once "./layout/Controller/C_login.php";
        $login = new LoginController();
        $login->showFormLogin();
        break;
    case 'register':
        include_once "./layout/Controller/C_login.php";
        $register = new LoginController();
        $register->showFormRegister();
        break;
    case 'shop':
        include_once "./layout/Controller/C_shop.php";
        $shop = new Shop();
        $shop->getProductAll();
        break;
    case 'cart':
        include_once "./layout/Controller/C_cart.php";
        $cart = new CartController();
        $cart->viewCart();
        break;
    case 'logout':
        unset($_SESSION['username']);
        header("location: index.php");
        break;
    case 'checkout':
        require_once "./layout/Controller/C_checkout.php";
        $checkout = new CheckoutController();
        if(isset($_POST['checkout'])){
            $checkout->checkout();
        }
        // $checkout->checkout();
        break;
    case 'products':
        include_once "./layout/Controller/C_search.php";
        $search = new ProductController();
        $search->search();
        break;
    default:
        echo "Trang không tồn tại.";
        break;
}



include_once "./layout/View/footer.php";
ob_end_flush();
?>
