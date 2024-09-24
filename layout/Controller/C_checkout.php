<?php
require_once "./layout/Model/checkoutmodel.php";

class CheckoutController {
    private $model;

    public function __construct() {
        $this->model = new CheckoutModel();
        include_once "./layout/View/checkout.php";
    }

    public function checkout() {
        // session_start();

        if (!isset($_SESSION['userId'])) {
            header("Location: index.php?trang=login");
            exit();
        }

        $userId = $_SESSION['userId'];

        include_once "./layout/Model/cartmodel.php";
        $model = new CartModel();
        $billId = $model->addUserBill($userId);

        echo $billId;

        // Thêm các sản phẩm vào hóa đơn
        if (isset($_POST['products'])) {
            foreach ($_POST['products'] as $product) {
                $model->addProductBill($billId, $product['id'], $product['quantity'], $product['price']);
            }
        }

        header("Location: index.php?page=info&load=order");
        exit();
    }
}
