<?php


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $model = new ProductModel();
    $model->deleteCategory($id);
    header("Location: /layoutadmin/index.php?trang=category");
    exit();
} else {
    header("Location: /layoutadmin/index.php?trang=category");
    exit();
}
?>
