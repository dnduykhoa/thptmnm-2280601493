<?php 
// Require SessionHelper and other necessary files 
require_once('app/config/database.php'); 
require_once('app/models/ProductModel.php'); 
require_once('app/models/CategoryModel.php'); 
 
class ProductController 
{ 
    private $productModel; 
    private $db; 
 
    public function __construct() 
    { 
        $this->db = (new Database())->getConnection(); 
        $this->productModel = new ProductModel($this->db); 
    } 

    // Kiểm tra quyền Admin 
    private function isAdmin() { 
        return SessionHelper::isAdmin(); 
    }

    public function index()
    {
        // Lấy tham số tìm kiếm từ URL
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        
        // Gọi model để lấy danh sách sản phẩm
        if ($search) {
            // Tìm kiếm sản phẩm theo từ khóa
            $products = $this->productModel->searchProducts($search);
        } else {
            // Lấy tất cả sản phẩm nếu không có từ khóa tìm kiếm
            $products = $this->productModel->getProducts();
        }

        // Chuẩn bị dữ liệu cho view
        $data = [
            'products' => $products,
            'search' => $search // Gửi từ khóa tìm kiếm để giữ lại trong input
        ];
    
        // Gửi dữ liệu tới view
        include 'app/views/product/list.php';
    }
 
    public function show($id) 
    { 
        $product = $this->productModel->getProductById($id); 
 
        if ($product) { 
            include 'app/views/product/show.php'; 
        } else { 
            echo "Không thấy sản phẩm."; 
        } 
    } 
 
    // Thêm sản phẩm (chỉ Admin) 
    public function add() { 
        if (!$this->isAdmin()) { 
            echo "Bạn không có quyền truy cập chức năng này!"; 
            exit; 
        } 
        
        $categories = (new CategoryModel($this->db))->getCategories(); 
        include_once 'app/views/product/add.php'; 
    }
 
    public function save() 
    {
        if (!$this->isAdmin()) { 
            echo "Bạn không có quyền truy cập chức năng này!"; 
            exit; 
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = "";
            }

            $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);
            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /WebsiteBanHoa/Product');
            }
        }
    }
 
    public function edit($id) 
    { 
        if (!$this->isAdmin()) { 
            echo "Bạn không có quyền truy cập chức năng này!"; 
            exit; 
        } 

        $product = $this->productModel->getProductById($id); 
        $categories = (new CategoryModel($this->db))->getCategories(); 
 
        if ($product) { 
            include 'app/views/product/edit.php'; 
        } else { 
            echo "Không thấy sản phẩm."; 
        } 
    } 
 
    public function update() 
    { 
        if (!$this->isAdmin()) { 
            echo "Bạn không có quyền truy cập chức năng này!"; 
            exit; 
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $id = $_POST['id']; 
            $name = $_POST['name']; 
            $description = $_POST['description']; 
            $price = $_POST['price']; 
            $category_id = $_POST['category_id']; 
 
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) { 
                $image = $this->uploadImage($_FILES['image']); 
            } else { 
                $image = $_POST['existing_image']; 
            } 
 
            $edit = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image);
            if ($edit) { 
                header('Location: /WebsiteBanHoa/Product'); 
            } else { 
                echo "Đã xảy ra lỗi khi lưu sản phẩm."; 
            } 
        } 
    } 
 
    public function delete($id) 
    { 
        if (!$this->isAdmin()) { 
            echo "Bạn không có quyền truy cập chức năng này!"; 
            exit; 
        } 
        
        if ($this->productModel->deleteProduct($id)) { 
            header('Location: /WebsiteBanHoa/Product'); 
        } else { 
            echo "Đã xảy ra lỗi khi xóa sản phẩm."; 
        } 
    } 
 
    private function uploadImage($file) 
    {
        $target_dir = "uploads/";

        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem file có phải là hình ảnh không
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File không phải là hình ảnh.");
        }

        // Kiểm tra kích thước file (10 MB = 10 * 1024 * 1024 bytes)
        if ($file["size"] > 10 * 1024 * 1024) {
            throw new Exception("Hình ảnh có kích thước quá lớn.");
        }

        // Chỉ cho phép một số định dạng hình ảnh nhất định
        $allowed_types = ["jpg", "png", "jpeg", "gif", "webp"];
        // Kiểm tra định dạng file
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF và WEBPWEBP.");
        }

        // Lưu file
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Có lỗi xảy ra khi tải lên hình ảnh.");
        }

        return $target_file;
    }


    public function addToCart($id) 
    { 
        $product = $this->productModel->getProductById($id); 
        if (!$product) { 
            echo "Không tìm thấy sản phẩm."; 
            return; 
        } 
        if (!isset($_SESSION['cart'])) { 
            $_SESSION['cart'] = []; 
        } 
        if (isset($_SESSION['cart'][$id])) { 
            $_SESSION['cart'][$id]['quantity']++; 
        } else { 
            $_SESSION['cart'][$id] = [ 
            'name' => $product->name, 
            'price' => $product->price, 
            'quantity' => 1, 
            'image' => $product->image 
            ]; 
        }   
        header('Location: /WebsiteBanHoa/Product/cart'); 
    } 

    public function cart() 
    { 
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : []; 
        include 'app/views/product/cart.php'; 
    } 

    public function increaseQuantity($id) 
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        }
        header('Location: /WebsiteBanHoa/Product/cart');
    }

    public function decreaseQuantity($id) 
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']--;
            if ($_SESSION['cart'][$id]['quantity'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: /WebsiteBanHoa/Product/cart');
    }

    public function removeFromCart($id) 
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: /WebsiteBanHoa/Product/cart');
    }
 
    public function checkout() 
    { 
        include 'app/views/product/checkout.php'; 
    } 

    public function processCheckout() 
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $name = $_POST['name']; 
            $phone = $_POST['phone']; 
            $address = $_POST['address']; 
 
            // Kiểm tra giỏ hàng 
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) { 
                echo "Giỏ hàng trống."; 
                return; 
            } 
 
            // Bắt đầu giao dịch
            $this->db->beginTransaction(); 
 
            try { 
                // Lưu thông tin đơn hàng vào bảng orders 
                $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)"; 
                $stmt = $this->db->prepare($query); 
                $stmt->bindParam(':name', $name); 
                $stmt->bindParam(':phone', $phone); 
                $stmt->bindParam(':address', $address); 
                $stmt->execute(); 
                $order_id = $this->db->lastInsertId(); 
 
                // Lưu chi tiết đơn hàng vào bảng order_details 
                $cart = $_SESSION['cart']; 
                foreach ($cart as $product_id => $item) { 
                    $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)"; 
                    $stmt = $this->db->prepare($query); 
                    $stmt->bindParam(':order_id', $order_id); 
                    $stmt->bindParam(':product_id', $product_id); 
                    $stmt->bindParam(':quantity', $item['quantity']); 
                    $stmt->bindParam(':price', $item['price']); 
                    $stmt->execute(); 
                } 

                // Xóa giỏ hàng sau khi đặt hàng thành công 
                unset($_SESSION['cart']); 
 
                // Commit giao dịch 
                $this->db->commit(); 
 
                // Chuyển hướng đến trang xác nhận đơn hàng 
                header('Location: /WebsiteBanHoa/Product/orderConfirmation'); 
            } catch (Exception $e) { 
                // Rollback giao dịch nếu có lỗi 
                $this->db->rollBack(); 
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage(); 
            } 
        } 
    } 

    public function orderConfirmation() 
    { 
        include 'app/views/product/orderConfirmation.php'; 
    }
} 
?>