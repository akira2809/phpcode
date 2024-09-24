<?php
// session_start();
require_once "./layout/Model/CartModel.php";

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }

    public function addToCart($productId, $quantity) {
        $product = $this->cartModel->getProductById($productId);
        if (!$product) {
            echo "Product not found!";
            return;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product']['id'] == $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = [
                'product' => $product[0],
                'quantity' => $quantity
            ];
        }

        header("Location: index.php?trang=cart");

        
        exit();
    }

    public function removeFromCart($productId) {
        if (!isset($_SESSION['cart'])) {
            return;
        }

        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product']['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }

        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
        header("Location: index.php?trang=cart");
        exit();
    }

    public function viewCart() {
        $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include "./layout/View/cart_view.php";
    }
    public function processCheckout() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $postal_code = $_POST['postal_code'];
            $phone = $_POST['phone'];
            $payment_method = $_POST['payment_method'];
    
            // Here you would typically handle the checkout process
            // such as saving order details to the database and processing payment
    
            // For now, let's just redirect to a confirmation page or show a success message
            header('Location: index.php?trang=confirmation');
            exit();
        }
    }
    
}
?>
