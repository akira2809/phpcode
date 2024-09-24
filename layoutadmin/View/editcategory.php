<form action="index.php?trang=editcategory&action=editCategory" method="post">
    <input type="hidden" name="id" value="<?= isset($_GET['id']) ? htmlspecialchars($_GET['id'], ENT_QUOTES) : '' ?>">
    <label for="categoryName">Category Name:</label>
    <input type="text" id="categoryName" name="NAME" value="<?php echo isset($this->listPro['NAME']) ? htmlspecialchars($this->listPro['NAME']) : '' ?>" required>
    <input type="submit" value="<?= isset($category) ? 'Edit Category' : 'Add Category' ?>">
</form>
