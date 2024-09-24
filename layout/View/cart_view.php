
    <div class="container-cart">
    <div class="shopping-cart">
        <h1 class="cart-header">Your Shopping Cart</h1>
        <div class="cart-container">
            <?php if (empty($cartItems)): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <div class="cart-items">
                    <ul>
                        <?php foreach ($cartItems as $item): ?>
                            <li>
                                <?php echo htmlspecialchars($item['product']['NAME']); ?>
                                - Quantity: <?php echo htmlspecialchars($item['quantity']); ?>
                                - Price: $<?php echo htmlspecialchars($item['product']['price'] * $item['quantity']); ?>
                                <img src="./<?=$item['product']['picture']?>" alt="">
                                <form method="post" action="index.php?trang=cart" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['product']['id']); ?>">
                                    <input type="submit" name="remove" value="Remove">
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="cart-total">
                    <span>Total:</span>
                    <span>$<?php 
                        $total = 0;
                        foreach ($cartItems as $item) {
                            $total += $item['product']['price'] * $item['quantity'];
                        }
                        echo $total;
                        // var_dump($_SESSION['cart']);
                    ?></span>
                </div>
        <form method="post" action="index.php?trang=checkout">
        <input type="hidden" name="product_id" value="<?= $result[0]['id'] ?>">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" name="add_to_cart" class="cart">checkout</button>
    </form>
            <?php endif; ?>
        </div>
    </div>
 
    </div>
