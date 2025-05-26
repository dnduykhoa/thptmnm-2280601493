<?php 
// Require SessionHelper and other necessary files 
require_once('app/config/database.php'); 
require_once('app/models/CategoryModel.php'); 

class CategoryController 
{ 
    private $categoryModel; 
    private $db;

    public function __construct() 
    { 
        $this->db = (new Database())->getConnection(); 
        $this->categoryModel = new CategoryModel($this->db); 
    } 

    public function index() 
    { 
        $this->list(); 
    }

    public function list() 
    { 
        $categories = $this->categoryModel->getCategories(); 
        include 'app/views/category/list.php'; 
    } 

    public function add() 
    {
        include 'app/views/category/add.php'; 
    }

    public function save() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';

            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Tên danh mục không được để trống';
            }

            if (count($errors) > 0) {
                include 'app/views/category/add.php';
            } else {
                $result = $this->categoryModel->addCategory($name);
                if ($result) {
                    header('Location: /WebsiteBanHoa/Category/list');
                } else {
                    $errors['general'] = 'Đã xảy ra lỗi khi thêm danh mục';
                    include 'app/views/category/add.php';
                }
            }
        }
    }

    public function edit($id) 
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    public function update() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? '';

            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Tên danh mục không được để trống';
            }

            if (count($errors) > 0) {
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/category/edit.php';
            } else {
                $result = $this->categoryModel->updateCategory($id, $name);
                if ($result) {
                    header('Location: /WebsiteBanHoa/Category/list');
                } else {
                    $errors['general'] = 'Đã xảy ra lỗi khi cập nhật danh mục';
                    $category = $this->categoryModel->getCategoryById($id);
                    include 'app/views/category/edit.php';
                }
            }
        }
    }

    public function delete($id) 
    {
        $result = $this->categoryModel->deleteCategory($id);
        if ($result) {
            header('Location: /WebsiteBanHoa/Category/list');
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    }
} 
?>