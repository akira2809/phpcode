<form action="index.php?trang=addcategory&action=addCategory" method="post">
    <input type="number" name="id" value="<?= isset($category) ? htmlspecialchars($category['id'], ENT_QUOTES) : '' ?>">
    <label for="categoryName">Category Name:</label>
    <input type="text" id="categoryName" name="NAME" value="<?= isset($category) ? htmlspecialchars($category['NAME'], ENT_QUOTES) : '' ?>" required>
    <input type="submit" value="<?= isset($category) ? 'Update Category' : 'Add Category' ?>">
</form>
