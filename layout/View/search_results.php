<?php if (!empty($this->listPro)): ?>
    <ul class="product-list">
        <?php foreach ($this->listPro as $product): ?>
            <li class="product-item">
                <a href="index.php?trang=detail&id=<?= $product['id'] ?>&idCat=<?= $product['idCat'] ?>">
                    <div class="product-image">
                        <img src="./<?php echo htmlspecialchars($product['picture']); ?>" alt="<?php echo htmlspecialchars($product['NAME']); ?>">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo htmlspecialchars($product['NAME']); ?></h3>
                        <p class="product-price">Price: <?php echo htmlspecialchars($product['price']); ?></p>
                        <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>
<style>
    /* Định dạng danh sách sản phẩm */
.product-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

/* Định dạng mỗi mục sản phẩm */
.product-item {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Định dạng liên kết sản phẩm */
.product-item a {
    text-decoration: none;
    color: inherit;
    display: block;
}

/* Định dạng hình ảnh sản phẩm */
.product-image img {
    width: 100%;
    height: auto;
    display: block;
}

/* Định dạng thông tin sản phẩm */
.product-info {
    padding: 15px;
}

.product-name {
    font-size: 18px;
    font-weight: bold;
    margin: 0 0 10px;
}

.product-price {
    color: #e91e63;
    font-size: 16px;
    margin: 0 0 10px;
}

.product-description {
    color: #757575;
    font-size: 14px;
    line-height: 1.5;
}

/* Định dạng khi không tìm thấy sản phẩm */
p {
    font-size: 18px;
    color: #757575;
}

</style>