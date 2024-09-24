<div class="container-coffee2">
        <?php if (!empty($this->listPro) && is_array($this->listPro)) : ?>
            <table class="styled-table2">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->listPro as $product) : ?>
                        <tr>
                            <td><?= htmlspecialchars($product['NAME'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><img src="../<?= htmlspecialchars($product['picture'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($product['NAME'], ENT_QUOTES, 'UTF-8') ?>"></td>
                            <td><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') ?> $</td>
                            <td class="btn-button2">
                                <a href="index.php?trang=products&action=deleteProduct&id=<?= $product['id'] ?>" onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="index.php?trang=editproduct&id=<?= $product['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>