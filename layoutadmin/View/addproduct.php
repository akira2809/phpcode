<form action="index.php?trang=addproduct&action=addProduct" method="post" enctype="multipart/form-data">
    
    <label for="productName">Product Name:</label><br>
    <input type="text" id="productName" name="NAME" required><br><br>

    <label for="productPrice">Price:</label><br>
    <input type="number" id="productPrice" name="price" step="0.01" required><br><br>

    <label for="productDescription">Description:</label><br>
    <textarea id="productDescription" name="description" rows="4" cols="50"></textarea><br><br>

    <label for="productCategory">Category:</label><br>
    <select id="productCategory" name="id" required>
        <?php foreach($listCat as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['NAME'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="productImage">Product Image URL:</label><br>
    <input type="file" id="productImage" name="picture"><br><br>

    <input type="submit" value="Add Product">
</form>
