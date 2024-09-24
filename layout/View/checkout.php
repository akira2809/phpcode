<?php
// session_start();

if (!isset($_SESSION['username'])) {
    // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?trang=login");
    exit();
}
?>
<div class="checkout-container">
    <h1 class="checkout-heading">Checkout</h1>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="checkout-error-message"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <form class="checkout-form" action="index.php?trang=checkout" method="post">
       

        <h2 class="checkout-products-heading">Products</h2>
        <ul class="checkout-products-list">
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <li class="checkout-product-item">
                   

                        <div>  
                        <img src="./<?=$item['product']['picture']?>" alt="" class="checkout-product-image">
                        <input hidden type="text" readonly name="products[<?=$index?>][name]" value="<?= $item['product']['NAME']?>"></div>
                        <p class="name"><?= $item['product']['NAME']?></p>
                        <div>

                        <label for="product2_price">Giá:</label>
                        <input type="text" readonly name="products[<?=$index?>][price]"  value="<?= $item['product']['price'] ?>">
                        </div>
                        <div>

                        <label for="product2_quantity">Số lượng:</label>
                        <input type="text" readonly name="products[<?=$index?>][quantity]"  value="<?= $item['quantity'] ?>">
                        </div>
                <?php endforeach; ?>
                <div class="cart-total">
                    <span>Total:</span>
                    <span>$<?php 
                        $total = 0;
                        foreach (($_SESSION['cart']) as $item) {
                            $total += $item['product']['price'] * $item['quantity'];
                        }
                        echo $total;
                        // var_dump($_SESSION['cart']);
                    ?></span>
                </div>  
            <?php else: ?>
                <li class="checkout-empty-cart">No products in the cart.</li>
            <?php endif; ?>
        </ul>

        <button type="submit" name="checkout" class="checkout-submit-button">Place Order</button>
    </form>
</div>
