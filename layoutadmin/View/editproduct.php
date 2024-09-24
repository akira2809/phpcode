<form action="index.php?trang=editproduct&action=editProduct&id=<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>" method="post" enctype="multipart/form-data">
    <label for="productName">Product Name:</label><br>
    <input type="text" id="productName" name="NAME" value="<?php echo isset($this->listPro['NAME']) ? htmlspecialchars($this->listPro['NAME']) : '' ?>" required><br><br>

    <label for="productPrice">Price:</label><br>
    <input type="number" id="productPrice" name="price" value="<?php echo isset($this->listPro['price']) ? htmlspecialchars($this->listPro['price']) : '' ?>" step="0.01" required><br><br>

    <label for="productDescription">Description:</label><br>
    <textarea id="productDescription" name="description" rows="4" cols="50"><?php echo isset($this->listPro['description']) ? htmlspecialchars($this->listPro['description']) : '' ?></textarea><br><br>

    <label for="productCategory">Category:</label><br>
    <select id="productCategory" name="idCat" required>
        <?php foreach($listCat as $category): ?>
            <option value="<?= $category['id'] ?>" <?= isset($this->listPro['idCat']) && $this->listPro['idCat'] == $category['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['NAME']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="productImage">Product Image:</label><br>
    <input type="file" id="productImage" name="picture"><br><br>

    <input type="submit" value="Save Changes">
</form>
