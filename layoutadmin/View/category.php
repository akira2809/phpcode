<div class="option">
    <?php if (!empty($this->listPro) && is_array($this->listPro)) : ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->listPro as $category): ?>
                    <tr>
                        <td><?= htmlspecialchars($category['id'], ENT_QUOTES) ?></td>
                        <td><?= htmlspecialchars($category['NAME'], ENT_QUOTES) ?></td>
                        <td class="adodo">
                            <a class="liems" href="index.php?trang=editcategory&id=<?= $category['id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="index.php?trang=category&action=deleteCategory&id=<?= $category['id'] ?>" onclick="return confirm('Are you sure you want to delete this category?')"><i style="color: #FF5733;" class ="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No categories available.</p>
    <?php endif; ?>
</div>
