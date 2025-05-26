<?php 
// Require các file cần thiết 
require_once('app/config/database.php'); 
require_once('app/models/ProductModel.php'); 
require_once('app/models/CategoryModel.php'); 

class DefaultController 
{ 
    private $productModel; 
    private $categoryModel; 
    private $db;

    public function __construct() 
    { 
        $this->db = (new Database())->getConnection(); 
        $this->productModel = new ProductModel($this->db); 
        $this->categoryModel = new CategoryModel($this->db); 
    } 

    public function index() 
    { 
        // Lấy danh sách sản phẩm và danh mục cho trang chủ
        $products = $this->productModel->getProducts(); 
        $categories = $this->categoryModel->getCategories(); 
        include 'app/views/home/index.php'; 
    } 
} 
?>