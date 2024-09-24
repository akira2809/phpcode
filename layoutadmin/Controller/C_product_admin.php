<?php
class Product {
    public $listPro;

    public function view() {
        // Lấy danh sách tất cả các danh mục
        $listCat = $this->getAllCategory();
        
        // Khởi tạo model sản phẩm
        $model = new ProductModel();
        
        // Lấy sản phẩm theo ID được truyền qua URL (GET request)
        $productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $this->listPro = $model->getProductOne($productId); // Lấy thông tin sản phẩm theo ID
        
        // Gọi tệp view để hiển thị sản phẩm
        require_once "view/editproduct.php";
    }
    
    
    public function viewCate(){
        
        // Khởi tạo model sản phẩm
        $model = new ProductModel();
        
        // Lấy sản phẩm theo ID được truyền qua URL (GET request)
        $categoryId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $this->listPro = $model->getCategoryById($categoryId); // Lấy thông tin sản phẩm theo ID
        
        require_once "view/editcategory.php";
    }

    public function fix() {
        $listCat = $this ->getAllCategory();
        require_once "view/addproduct.php";


    }
    public function fixCate(){
        require_once "view/addcategory.php";
    }

    public function getAllCategories() {
        $model = new Homemodel();
        $this->listPro = $model->getAllCategories(); //
        include "view/category.php";
    }

    public function getProductAll() {
        $pro = new Homemodel();
        $this->listPro = $pro->getAllProducts();
        include "view/product.php";
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $model = new ProductModel();
            $pro = $model ->getProductOne($id);
            var_dump($pro);
           if($model->deleteProduct($id)){
                unlink('../'. $pro['picture']);
              
           }
            header("Location: /layoutadmin/index.php?trang=products");
            exit();
        }
    }

    
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            $name = htmlspecialchars($_POST['NAME'], ENT_QUOTES);
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
            $price = floatval($_POST['price']);
            $uploadDir = '../uploads/';
            $picture = $uploadDir . basename($_FILES['picture']['name']);
            $picturetemp = substr($picture, 3);  // Lấy đường dẫn từ thư mục gốc
    
            $model = new ProductModel();
            if ($model->checkimage($picturetemp)) {
                $imageFileType = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
                $imageName = strtolower(pathinfo($picture, PATHINFO_FILENAME)) . 'Copy';
    
                // Tạo tên mới cho ảnh nếu đã tồn tại
                $newPicture = $uploadDir . $imageName . '.' . $imageFileType;
                $counter = 1;
                while (file_exists($newPicture)) {
                    $newPicture = $uploadDir . $imageName . $counter . '.' . $imageFileType;
                    $counter++;
                }
    
                // Di chuyển ảnh đến vị trí mới
                move_uploaded_file($_FILES['picture']['tmp_name'], $newPicture);
                $imageUpload = substr($newPicture, 3);  // Lấy đường dẫn từ thư mục gốc
            } else {
                move_uploaded_file($_FILES['picture']['tmp_name'], $picture);
                $imageUpload = $picturetemp;
            }
    
            // Lưu sản phẩm vào cơ sở dữ liệu với đường dẫn ảnh
            $model->addProduct($name, $description, $imageUpload, $price, $id);
            header("Location: /layoutadmin/index.php?trang=products");
            exit();
        } else {
            $this->fix();
        }
    }
    
    public function getAllCategory(){
        $model = new Homemodel();
        return $model->getAllCategories();
        
    }

    //load data whre id
    //show data form
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_GET['id']);
            $idCat = intval($_POST['idCat']);
            $name = htmlspecialchars($_POST['NAME'], ENT_QUOTES);
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
            $price = floatval($_POST['price']);
            $picture = '../uploads/' . basename($_FILES['picture']['name']);

            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $picture)) {
                $picture = substr($picture, 3);
                $model = new ProductModel();
                $model->editProduct($name, $description, $picture, $price,$idCat, $id);
                header("Location: /layoutadmin/index.php?trang=products");
                exit();
            }
        } else {
            $this->view();
        }
    }

    public function deleteCategory() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $model = new ProductModel();
            
            $productCount = $model->getProductCountByCategory($id);
            
            if ($productCount > 0) {
                // Hiển thị thông báo xác nhận
                echo "<script>
                    var confirmDelete = confirm('Danh mục này có chứa " . $productCount . " sản phẩm. Bạn có chắc chắn muốn xóa?');
                    if (confirmDelete) {
                        window.location.href = '/layoutadmin/index.php?trang=deletecategory&id=" . $id . "';
                    } else {
                        window.location.href = '/layoutadmin/index.php?trang=category';
                    }
                </script>";
            } else {
                // Xóa trực tiếp nếu không có sản phẩm nào
                $model->deleteCategory($id);
                header("Location: /layoutadmin/index.php?trang=category");
                exit();
            }
        }
    }
    
    

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            $name = htmlspecialchars($_POST['NAME'], ENT_QUOTES);
            $model = new ProductModel();
            $model->addCategory($id, $name);
            header("Location: /layoutadmin/index.php?trang=category");
            exit();
        } else {
           $this->fixCate();
        }
    }

    public function editCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if required fields are set
            if (!isset($_POST['id']) || !isset($_POST['NAME'])) {
                echo "Error: Required fields are missing.";
                return;
            }
    
            // Sanitize input
            $id = intval($_POST['id']);
            $name = htmlspecialchars($_POST['NAME'], ENT_QUOTES);
            
            // Update category
            $model = new ProductModel();
            $result = $model->editCategory($name, $id);
    
            if ($result) {
                // Redirect back to category page after editing
                header("Location: index.php?trang=category");
                exit();
            } else {
                echo "Error: Failed to edit category.";
            }
        } else {
            // Load the view to edit/add category
            $this->viewCate();
        }
    }
    
    public function getProductbyName($productName){
        $model = new ProductModel();
        return $model->getProductByName($productName);
    }
    
}
  

if (isset($_GET['action'])) {
    $product = new Product();
    switch ($_GET['action']) {
        case 'deleteProduct':
            $product->delete();
            break;
        case 'editProduct':
            $product->edit();
            break;
        case 'addProduct':
            $product->add();
            break;
        case 'deleteCategory':
            $product->deleteCategory();
            break;
        case 'editCategory':
            $product->editCategory();
            break;
        case 'addCategory':
            $product->addCategory();
            break;
    }
}
?>
