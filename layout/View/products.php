
<?php if (!empty($this->listPro)): ?>

    <h2>Search Results:</h2>
    <ul>
        <?php foreach ($this->listPro as $product): ?>
            <li>
                <h1><?php echo htmlspecialchars($product['NAME']); ?></h1>
                <p>Price: <?php echo htmlspecialchars($product['price']); ?></p>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>
